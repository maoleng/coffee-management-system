<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Promotion;
use GuzzleHttp\Client;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CartController extends Controller
{

    public function index()
    {
        $cart = session()->get('cart') ?? [];
        $products = Product::query()->get();
        $result = [];
        foreach ($cart as $product_id => $amount) {
            $product = $products->where('id', $product_id)->first();
            $sum_price = $amount * $product->price;
            $result[$product_id]['amount'] = $amount;
            $result[$product_id]['sum_price'] = $sum_price;
            $result[$product_id]['information'] = $product;
        }
        $cart_summarize = $this->getCartSummarize();

        return view('customer.cart', [
            'products' => $result,
//            'price_products' => $cart_summarize['price_products'],
//            'tax' => $cart_summarize['tax'],
            'total' => $cart_summarize['total'],
        ]);
    }

    public function getCartSummarize(): array
    {
        $cart = session()->get('cart') ?? [];
        $products = Product::query()->get();
        $price_products = 0;
        foreach ($cart as $product_id => $amount) {
            $product = $products->where('id', $product_id)->first();
            $price_products += $amount * $product->price;
        }
        $ship = session()->get('ship_fee');
        $ship_fee = $ship ?? 0;
        $promotion = session()->get('promotion');
        $promotion_reduce = $promotion === null ? 0 : ($price_products * $promotion->percent / 100);

        return [
            'price_products' => $price_products,
            'promotion_reduce' => $promotion_reduce,
            'ship_fee' => $ship_fee,
            'total' => $price_products - $promotion_reduce + $ship_fee,
        ];
    }

    public function changeCart(Request $request)
    {
        $this->addToCart($request);

        return redirect()->to(url()->previous() . '#content');
    }

    public function removeProduct(Request $request): RedirectResponse
    {
        session()->remove("cart.{$request->get('product_id')}");

        return redirect()->to(url()->previous() . '#content');
    }

    public function addPromotion(Request $request)
    {
        $code = $request->get('code');
        if ($code === null) {
            session()->remove('promotion');

            return redirect()->to(url()->previous() . '#content')->with('error', 'Delete promotion successfully');
        }
        if (empty(authed())) {
            return redirect()->to(url()->previous() . '#content')->with('error', 'You are not login');
        }
        $promotion = Promotion::query()->where('code', $code)
            ->where('active', true)
            ->where('expired_at', '>', now())
            ->whereDoesntHave('orders', function ($q) {
                $q->where('user_id', authed()->id);
            })
            ->first();
        if (empty($promotion)) {
            return redirect()->to(url()->previous() . '#content')->with('error', 'Code is invalid or expired');
        }
        session()->put('promotion', $promotion);

        return redirect()->to(url()->previous() . '#content')->with('error', 'Successfully');
    }

    public function addInformation(Request $request)
    {
        $data = $request->except('_token');
        session()->put('information', $data);

        $total = $this->getCartSummarize()['total'];
        $headers = [
            'Token' => env('GHTK_TOKEN'),
            'Content-Type' => 'application/json'
        ];
        $body = [
            "pick_province" => "Hồ Chí Minh",
            "pick_district" => "Quận 7",
            "province" => "Hồ Chí Minh",
            "district" => $data['address'],
            "weight" => 500,
            "value" => $total,
            "transport" => "fly",
            "deliver_option" => "none",
            "tags" => [
                1,
                7
            ]
        ];
        $client = new Client();
        $response = $client->get('https://services.giaohangtietkiem.vn/services/shipment/fee', [
            'headers' => $headers,
            'json' => $body,
        ])->getBody()->getContents();
        $response = json_decode($response);
        session()->put('ship_fee', $response->fee->ship_fee_only);

        return redirect()->back();
    }

    public function checkout()
    {
        $summarize = $this->getCartSummarize();
        $information = session()->get('information');

        return view('customer.checkout', array_merge($summarize, $information));
    }

    public function addToCart(Request $request)
    {
        $data = $request->all();
        $product_id = $data['product_id'];
        $type = $data['type'] ?? 'increase';

        $count_product = session()->get("cart.$product_id");
        if ($type === 'increase') {
            if ($count_product === null) {
                session()->put("cart.$product_id", 1);
            } elseif ($count_product === 10) {
                session()->put("cart.$product_id", 10);
            } else {
                session()->increment("cart.$product_id");
            }
        } else {
            $count_product === 1 ?
                session()->remove("cart.$product_id", 1) :
                session()->decrement("cart.$product_id");
        }

    }
}
