<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index()
    {
        $products = Product::query()->with(['category', 'images'])->orderByDesc('created_at')->get()->take(6);
        $categories = Category::query()->get();
        $posts = Post::query()->with('admin')->orderByDesc('created_at')->get()->take(3);

        return view('customer.index', [
            'products' => $products,
            'categories' => $categories,
            'posts' => $posts,
        ]);
    }

    public function product(Request $request)
    {
        $data = $request->all();
        $categories = Category::query()->withCount('products')->get();
        $builder = Product::query();
        if (isset($data['category'])) {
            $builder->whereHas('category', function ($q) use ($data) {
                return $q->where('name', $data['category']);
            });
        }
        if (isset($data['q'])) {
            $builder->where(function ($q) use ($data) {
                $q->orWhere('name', 'LIKE', "%{$data['q']}%")
                    ->orWhere('price', 'LIKE', "%{$data['q']}%")
                    ->orWhere('description', 'LIKE', "%{$data['q']}%")
                    ->orWhere('expire_month', 'LIKE', "%{$data['q']}%");
            });
        }
        $products = $builder->with(['category', 'images'])->orderByDesc('created_at')->paginate(9);

        return view('customer.product', [
            'products' => $products,
            'categories' => $categories,

        ]);
    }
}
