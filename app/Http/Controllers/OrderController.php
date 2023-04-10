<?php

namespace App\Http\Controllers;

use App\Enums\OrderStatus;
use App\Models\Order;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class OrderController extends Controller
{

    public function index(Request $request): View
    {
        $data = $request->all();

        $builder = Order::query();
        if (isset($data['status'])) {
            $builder->where('status', $data['status']);
        }
        if (isset($data['q'])) {
            $builder->where('name', 'LIKE', "%{$data['q']}%")
                ->orWhere('address', 'LIKE', "%{$data['q']}%")
                ->orWhere('email', 'LIKE', "%{$data['q']}%")
                ->orWhere('phone', 'LIKE', "%{$data['q']}%")
                ->orWhere('ship_fee', 'LIKE', "%{$data['q']}%")
                ->orWhere('total', 'LIKE', "%{$data['q']}%")
                ->orWhere('ordered_at', 'LIKE', "%{$data['q']}%");
        }

        $orders = $builder->with(['user', 'promotion'])
            ->orderBy('status')->orderByDesc('ordered_at')->paginate(10);

        return view('admin.order.index', [
            'orders' => $orders,
            'order_status' => OrderStatus::getDescriptions(),
        ]);
    }

    public function update(Request $request): void
    {
        $data = $request->all();
        $order_id = $data['order_id'];

        $update_data = [];
        if (isset($data['is_paid'])) {
            $update_data['is_paid'] = (bool) $data['is_paid'];
        }
        if (isset($data['status'])) {
            if ((int) $data['status'] === OrderStatus::SUCCESSFUL) {
                $update_data['is_paid'] = true;
            }
            $update_data['status'] = (int) $data['status'];
        }
        Order::query()->where('id', $order_id)->update($update_data);
    }

    public function print(): View
    {
        $data = $this->show();

        return view('admin.order.print', $data);
    }

    public function show(): array
    {
        $order_id = request()->get('order_id');
        $order = Order::query()->with(['orderProducts', 'promotion', 'admin'])->find($order_id);

        $products = [];
        $sub_total = 0;
        foreach ($order->orderProducts as $product) {
            $price = $product->pivot->price;
            $amount = $product->pivot->amount;
            $total = $price * $amount;
            $sub_total += $total;
            $products[] = [
                'name' => $product->pivot->name,
                'price' => prettyPrice($price),
                'amount' => $amount,
                'total' => prettyPrice($total),
            ];
        }
        $discount = $order->promotion ? ($sub_total * $order->promotion->percent / 100) : 0;
        $ship = $order->ship_fee;
        $total = $sub_total - $discount + $ship;

        return [
            'order_id' => $order->id,
            'products' => $products,
            'fee' => [
                'sub_total' => prettyPrice($sub_total),
                'discount' => prettyPrice($discount),
                'ship' => prettyPrice($ship),
                'total' => prettyPrice($total),
            ],
            'user' => [
                'name' => $order->name,
                'address' => $order->address,
                'phone' => $order->phone,
                'email' => $order->email,
            ],
            'ordered_at' => $order->ordered_at,
            'sales' => $order->admin->name ?? null,
            'status' => $order->statusDescription,
            'is_paid' => $order->prettyIsPaid,
        ];
    }



}
