<?php

namespace App\Http\Controllers;

use App\Lib\JWT\JWT;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Laravel\Socialite\Facades\Socialite;
use Symfony\Component\HttpFoundation\RedirectResponse;

class AuthController extends Controller
{
    public function login(): View
    {
        return view('login');
    }

    public function redirect(): RedirectResponse
    {
        return Socialite::driver('google')->redirect();
    }

    public function callback()
    {
        $user = Socialite::driver('google')->stateless()->user();
        $user = User::query()->updateOrCreate(
            [
                'email' => $user->email,
            ],
            [
                'name' => $user->name,
                'email' => $user->email,
                'avatar' => $user->avatar,
                'created_at' => now(),
            ],
        );

        $token = $this->generateToken($user);
        session()->put('token', $token);

        return redirect()->route('index');
    }

    public function logout(): \Illuminate\Http\RedirectResponse
    {
        session()->forget('token');
        session()->flush();
        session()->save();

        return redirect()->route('index');
    }

    private function generateToken($user)
    {
        return c(JWT::class)->encode([
            'id' => $user->id,
            'name' => $user->name,
            'email' => $user->email,
            'avatar' => $user->avatar,
            'active' => $user->active,
            'created_at' => $user->created_at,
        ]);
    }

}
