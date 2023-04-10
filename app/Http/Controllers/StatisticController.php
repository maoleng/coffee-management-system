<?php

namespace App\Http\Controllers;

use App\Enums\OrderStatus;
use App\Models\Import;
use App\Models\Order;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

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
        return view('admin.statistic.product');
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


}
