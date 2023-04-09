<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class StatisticController extends Controller
{

    public function revenue(): View
    {
        return view('admin.statistic.revenue');
    }

    public function product(): View
    {
        return view('admin.statistic.product');
    }

    public function customer(): View
    {
        return view('admin.statistic.customer');
    }



    public function getRevenue()
    {



    }


}
