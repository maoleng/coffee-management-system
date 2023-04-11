<?php

namespace App\Http\Controllers;

use App\Enums\PostCategory;
use App\Enums\SupportStatus;
use App\Models\Category;
use App\Models\Post;
use App\Models\Product;
use App\Models\Support;
use App\Models\Tag;
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
        $products = $builder->with(['category', 'images'])->orderByDesc('created_at')->paginate(6);

        return view('customer.product', [
            'products' => $products,
            'categories' => $categories,

        ]);
    }

    public function post(Request $request)
    {
        $data = $request->all();
        $builder = Post::query();
        if (isset($data['q'])) {
            $builder->where(function ($q) use ($data) {
                $q->orWhere('title', 'LIKE', "%{$data['q']}%")
                    ->orWhere('category', 'LIKE', "%{$data['q']}%")
                    ->orWhere('created_at', 'LIKE', "%{$data['q']}%");
            });
        }
        $posts = $builder->with('admin')->orderByDesc('created_at')->paginate(6);
        $other_posts = Post::query()->inRandomOrder()->get()->take(4);
        $tags = Tag::query()->get();

        return view('customer.post', [
            'posts' => $posts,
            'categories' => PostCategory::getDescriptions(),
            'other_posts' => $other_posts,
            'tags' => $tags,

        ]);
    }


    public function showProduct($id)
    {
        $product = Product::query()->with(['category', 'images'])->findOrFail($id);
        $relate_products = Product::query()->inRandomOrder()->where('category_id', $product->category_id)->get()->take(4);


        return view('customer.show_product', [
            'product' => $product,
            'relate_products' => $relate_products,
        ]);
    }

    public function support()
    {
        return view('customer.support');
    }

    public function sendSupportRequest(Request $request)
    {
        $data = $request->except('_token');
        Support::query()->create([
            'name' => $data['name'],
            'email' => $data['email'],
            'content' => $data['content'],
            'status' => SupportStatus::UNPROCESSED,
            'created_at' => now(),
        ]);
    }

    public function showPost(Post $post)
    {
        $other_posts = Post::query()->inRandomOrder()->get()->take(4);
        $tags = Tag::query()->get();

        return view('customer.show_post', [
            'post' => $post,
            'categories' => PostCategory::getDescriptions(),
            'other_posts' => $other_posts,
            'tags' => $tags,
        ]);
    }
}
