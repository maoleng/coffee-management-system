<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Product;

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
            'posts' => $posts
        ]);
    }

}
