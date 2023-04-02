<?php

namespace App\Http\Controllers;

use App\Http\Requests\Product\StoreRequest;
use App\Models\Category;
use App\Models\Image;
use App\Models\Product;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
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

    public function create()
    {
        $categories = Category::query()->get();

        return view('admin.product.create', [
            'categories' => $categories,
        ]);
    }

    public function store(StoreRequest $request): RedirectResponse
    {
        $data = $request->validated();
        $product = Product::query()->create([
            'name' => $data['name'],
            'price' => $data['price'],
            'description' => $data['description'],
            'expire_month' => $data['expire_month'],
            'category_id' => $data['category_id'],
        ]);

        foreach ($data['images'] as $i => $image) {
            $path = "products/$i.{$image->getClientOriginalExtension()}";
            Storage::disk('public')->put($path, $image->getContent());
            Image::query()->create([
                'source' => $path,
                'product_id' => $product->id,
            ]);
        }

        return redirect()->route('admin.warehouse.index');
    }
}
