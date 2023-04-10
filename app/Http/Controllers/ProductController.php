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

    public function index(): View
    {
        $products = Product::query()->with('images')->orderBy('name')->paginate(10);

        return view('admin.product.index', [
            'products' => $products,
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
            Image::query()->where('id', $product->id)->delete();
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

        return redirect()->route('admin.warehouse.index');
    }

    public function processImport(Request $request): RedirectResponse
    {
        $data = $request->all();
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
        $order = Order::query()->create([
            'status' => OrderStatus::DESTROY,
            'total' => $total,
            'admin_id' => authed()->id,
            'ordered_at' => now(),
        ]);
        $order->orderProducts()->sync($sync);
    }

    public function store(ProductRequest $request): RedirectResponse
    {
        $data = $request->validated();
        $product = Product::query()->create([
            'name' => $data['name'],
            'price' => $data['price'],
            'description' => $data['description'],
            'expire_month' => $data['expire_month'],
            'category_id' => $data['category_id'],
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

        return redirect()->route('admin.warehouse.index');
    }
}
