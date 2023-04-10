<?php

namespace App\Http\Controllers;

use App\Enums\OrderStatus;
use App\Models\Category;
use App\Models\Import;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StatisticController extends Controller
{

    public function revenue(): View
    {
        $orders = Order::query()->where('status', '!=', OrderStatus::DESTROY)->get()->append('profit');
        $month_revenue = $orders->where('ordered_at', '>', now()->subMonth())
            ->where('ordered_at', '<', now())
            ->sum('total');
        $month_profit = $orders->where('ordered_at', '>', now()->subMonth())
            ->where('ordered_at', '<', now())
            ->sum('profit');

        $total_revenue = $orders->sum('total');
        $total_profit = $orders->sum('profit');

        return view('admin.statistic.revenue', [
            'month_profit' => prettyPrice($month_profit),
            'total_profit' => prettyPrice($total_profit),
            'month_revenue' => prettyPrice($month_revenue),
            'total_revenue' => prettyPrice($total_revenue),
        ]);
    }

    public function product(): View
    {
        $total_order = Order::query()->count();
        $month_order = Order::query()->where('ordered_at', '>', now()->subMonth())
            ->where('ordered_at', '<', now())->count();

        return view('admin.statistic.product', [
            'total_order' => $total_order,
            'month_order' => $month_order,
        ]);
    }

    public function customer(): View
    {
        return view('admin.statistic.customer');
    }

    public function getChartRevenue(Request $request): array
    {
        $range = $request->get('range');

        $orders = Order::query()->where('status', '!=', OrderStatus::DESTROY)
            ->orderBy('ordered_at')->get()->append('profit');
        $day_diff = count(CarbonPeriod::create($range[0], $range[1]));
        $format = $day_diff <= 20 ? 'd-m-y' : 'M Y';
        $data = $orders->whereBetween('ordered_at', [$range[0], $range[1]])->groupBy(function($date) use ($format) {
            return Carbon::parse($date->ordered_at)->format($format);
        })->map(function ($orders) {
            return [
                'revenue' => $orders->sum('total'),
                'profit' => $orders->sum('profit')
            ];
        });
        $revenue = $data->pluck('revenue')->toArray();
        $profit = $data->pluck('profit')->toArray();
        $max = max($revenue) * 5 / 4;
        $step = $max / 10;

        return [
            'labels' => $data->keys()->toArray(),
            'revenue' => $revenue,
            'profit' => $profit,
            'max' => $max,
            'step' => $step,
        ];
    }

    public function getChartProduct(Request $request): array
    {
        $range = $request->get('range');

        $products = Product::query()->withCount(['orderProducts as sold' => function ($query) use ($range) {
            $query->select(DB::raw('SUM(amount)'))
                ->whereBetween('ordered_at', [$range[0], $range[1]]);
        }])->get()->sortByDesc('sold');

        $categories = Category::query()->get();
        $by_category = [];
        foreach ($categories as $category) {
            $by_category[$category->name] = $products->where('category_id', $category->id)->sum('sold') ?? 0;
        }

        $limit = count($products->whereNotNull('sold'));
        $top_product = $products->sortByDesc('sold')->take($limit)
            ->pluck('sold', 'name')->toArray();

        return [
            'by_category' => [
                'labels' => array_keys($by_category),
                'data' => array_values($by_category),
            ],
            'top_product' => [
                'labels' => array_keys($top_product),
                'data' => array_values($top_product),
            ],
        ];
    }


}
