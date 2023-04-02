<?php

namespace App\Http\Controllers;

use App\Lib\JWT\JWT;
use App\Models\Admin;
use App\Models\User;
use Laravel\Socialite\Facades\Socialite;
use Symfony\Component\HttpFoundation\RedirectResponse;

class DashboardController extends Controller
{

    public function index()
    {
        return view('admin.index');
    }

}
