<?php

use App\Lib\JWT\JWT;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;

if (!function_exists('c')) {
    function c(string $key)
    {
        return App::make($key);
    }
}

if (!function_exists('authed')) {
    function authed()
    {
        $token = session()->get('token');
        if (empty($token)) {
            return null;
        }

        return c(JWT::class)->match($token);
    }
}

if (!function_exists('prettyPrice')) {
    function prettyPrice($price): string
    {
        return number_format($price, 0, '', ',');
    }
}

if (!function_exists('appendMenu')) {
    function appendMenu($route): string
    {
        return Route::currentRouteName() === $route ? 'active' : '';
    }
}
