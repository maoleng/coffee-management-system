<?php

namespace App\Http\Controllers;

use App\Enums\OrderStatus;
use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Image;
use App\Models\Import;
use App\Models\Order;
use App\Models\Product;
use App\Models\Supplier;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{

    public function index(Request $request): View
    {
        $data = $request->all();
        $builder = Product::query();
        if (isset($data['category'])) {
            $builder->whereHas('category', function ($q) use ($data) {
                $q->where('name', 'LIKE', "%{$data['category']}%");
            });
        }
        if (isset($data['created_at'])) {
            $split = explode(',', $data['created_at']);
            $builder->whereBetween('created_at', [$split[0], $split[1]]);
        }
        if (isset($data['q'])) {
            $builder->where(function ($q) use ($data) {
                $q->orWhere('name', 'LIKE', "%{$data['q']}%")
                    ->orWhere('price', 'LIKE', "%{$data['q']}%")
                    ->orWhere('description', 'LIKE', "%{$data['q']}%")
                    ->orWhere('expire_month', 'LIKE', "%{$data['q']}%");
            });
        }
        $products = $builder->with('images')->orderByDesc('created_at')->paginate(10);
        $categories = Category::query()->get();

        return view('admin.product.index', [
            'products' => $products,
            'categories' => $categories,
        ]);
    }

    public function create(): View
    {
        $categories = Category::query()->get();

        return view('admin.product.create', [
            'categories' => $categories,
        ]);
    }

    public function import(): View
    {
        $products = Product::query()->get();
        $suppliers = Supplier::query()->get();

        return view('admin.product.import', [
            'products' => $products,
            'suppliers' => $suppliers,
        ]);
    }

    public function edit(Product $product): View
    {
        $categories = Category::query()->get();

        return view('admin.product.edit', [
            'product' => $product,
            'categories' => $categories,
        ]);
    }

    public function update(ProductRequest $request, Product $product): RedirectResponse
    {
        $data = $request->validated();
        $product->update([
            'name' => $data['name'],
            'price' => $data['price'],
            'description' => $data['description'],
            'expire_month' => $data['expire_month'],
            'category_id' => $data['category_id'],
        ]);

        if (isset($data['images'])) {
            $folder = "products/$product->id";
            Storage::disk('public')->delete($folder);
            Image::query()->where('product_id', $product->id)->delete();
            foreach ($data['images'] as $i => $image) {
                $path = "$folder/$i.{$image->getClientOriginalExtension()}";
                Storage::disk('public')->put($path, $image->getContent());
                Image::query()->create([
                    'source' => $path,
                    'product_id' => $product->id,
                ]);
            }
        }

        return redirect()->route('admin.warehouse.index');
    }

    public function destroy(Product $product): RedirectResponse
    {
        $product->delete();

        return redirect()->route('admin.warehouse.index')->with('success', 'Product deleted successfully');
    }

    public function processImport(Request $request): RedirectResponse
    {
        $data = $request->all();
        if (empty($data['products'])) {
            return redirect()->back()->with('error', 'Product not found or not filled');
        }
        $data['products'] = collect($data['products'])->whereNotNull('product_id')
            ->whereNotNull('price')->whereNotNull('amount')->toArray();
        $this->destroyOldProducts(array_column($data['products'], 'product_id'));
        $import = Import::query()->create([
            'total' => 0,
            'admin_id' => authed()->id,
            'supplier_id' => $data['supplier_id'],
            'created_at' => now(),
        ]);

        $sync = [];
        $total = 0;
        foreach ($data['products'] as $product) {
            $total += $product['price'] * $product['amount'];
            $sync[$product['product_id']] = [
                'price' => $product['price'],
                'amount' => $product['amount'],
            ];
        }

        $import->importProducts()->sync($sync);
        $import->update(['total' => $total]);

        return redirect()->route('admin.warehouse.index');
    }

    public function destroyOldProducts($product_ids): void
    {
        $products = Product::query()->whereIn('id', $product_ids)->with('importProducts')->get();
        $total = 0;
        foreach ($products as $product) {
            $import_products = $product->importProducts;
            if ($import_products->isEmpty()) {
                break;
            }
            $product = $import_products->where('created_at', $import_products->max('created_at'))->first()
                ->importProducts()->where('product_id', $product->id)->first();
            $amount = $product->left['amount'];
            $price = $product->pivot->price;
            $sync[$product->id] = [
                'name' => $product->name,
                'amount' => $amount,
                'price' => $price,
                'original_price' => $price,
            ];
            $total += $amount * $price;
        }
        if ($total !== 0) {
            $order = Order::query()->create([
                'status' => OrderStatus::DESTROY,
                'total' => $total,
                'admin_id' => authed()->id,
                'ordered_at' => now(),
            ]);
            $order->orderProducts()->sync($sync);
        }
    }

    public function store(ProductRequest $request): RedirectResponse
    {
        $data = $request->validated();
        if (empty($data['images']) || count($data['images']) < 2) {
            return redirect()->back()->with('error', 'Please provide at least 2 images');
        }
        $product = Product::query()->create([
            'name' => $data['name'],
            'price' => $data['price'],
            'description' => $data['description'],
            'expire_month' => $data['expire_month'],
            'category_id' => $data['category_id'],
            'created_at' => now(),
        ]);

        $folder = "products/$product->id";
        foreach ($data['images'] as $i => $image) {
            $path = "$folder/$i.{$image->getClientOriginalExtension()}";
            Storage::disk('public')->put($path, $image->getContent());
            Image::query()->create([
                'source' => $path,
                'product_id' => $product->id,
            ]);
        }

        return redirect()->route('admin.warehouse.index')->with('success', 'New product has been created successfully');
    }
}
