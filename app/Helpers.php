<?php

use App\Lib\JWT\JWT;
use Illuminate\Support\Facades\App;

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
