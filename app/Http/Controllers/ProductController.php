<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Contracts\View\View;

class ProductController extends Controller
{

    public function index(): View
    {
        $products = Product::query()->paginate(10);

        return view('admin.product.index', [
            'products' => $products,
        ]);
    }
}
