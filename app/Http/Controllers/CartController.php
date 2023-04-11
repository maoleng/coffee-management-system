<?php

namespace App\Http\Controllers;

use App\Enums\OrderStatus;
use App\Models\Order;
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
        $information = session()->get('information') ?? [];

        return view('customer.checkout', array_merge($summarize, $information));
    }

    public function pay()
    {
        $order = $this->handlePay();

        return [
            'url' => (new VNPayController())->createPaymentUrl($order->total, route('index')),
            'order_id' => $order->id,
        ];
    }

    public function directPay()
    {
        $this->handlePay();
    }

    public function updateIsPaid(Request $request)
    {
        $order_id = $request->get('order_id');
        Order::query()->where('id', $order_id)->update(['is_paid' => true]);
    }

    private function handlePay()
    {
        $data = session()->all();
        $total = $this->getCartSummarize()['total'];
        $products = Product::query()->with('importProducts')->get();

        $sync = [];
        foreach ($data['cart'] as $product_id => $amount) {
            $product = $products->where('id', $product_id)->first();
            $original_price = $product->importProducts()->orderByDesc('created_at')->first()->pivot->price;
            $sync[$product_id] = [
                'name' => $product->name,
                'amount' => $amount,
                'price' => $product->price,
                'original_price' => $original_price,
            ];
        }
        $order = Order::query()->create([
            'user_id' => authed()->id ?? null,
            'name' => $data['information']['name'],
            'address' => $data['information']['address'],
            'email' => $data['information']['email'],
            'phone' => $data['information']['phone'],
            'status' => OrderStatus::UNPROCESSED,
            'ship_fee' => $data['ship_fee'],
            'total' => $total,
            'promotion_id' => isset($data['promotion']) ? $data['promotion']->id : null,
            'ordered_at' => now(),
        ]);
        $order->orderProducts()->sync($sync);
        session()->remove('information');
        session()->remove('total');
        session()->remove('ship_fee');
        session()->remove('cart');

        return $order;
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

    public function orderHistory()
    {
        if (empty(authed())) {
            return redirect()->back();
        }
        $orders = Order::query()->where('user_id', authed()->id)->orderByDesc('ordered_at')->paginate(9);

        return view('customer.order_history', [
            'orders' => $orders,
        ]);
    }

    public function orderDetail()
    {
        $data = (new OrderController())->show();

        return view('admin.order.print', $data);
    }
}
