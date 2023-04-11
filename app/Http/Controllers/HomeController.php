<?php

namespace App\Http\Controllers;

use App\Models\Product;

class HomeController extends Controller
{

    public function index()
    {
        $products = Product::query()->get()->take(10);

        return view('customer.index', [
            'products' => $products,
        ]);
    }

}
