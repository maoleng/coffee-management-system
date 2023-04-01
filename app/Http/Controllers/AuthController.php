<?php

namespace App\Http\Controllers;

use App\Lib\JWT\JWT;
use App\Models\Admin;
use App\Models\User;
use Laravel\Socialite\Facades\Socialite;
use Symfony\Component\HttpFoundation\RedirectResponse;

class AuthController extends Controller
{

    public function redirect(): RedirectResponse
    {
        return Socialite::driver('google')->redirect();
    }

    public function callback()
    {
        $user = Socialite::driver('google')->stateless()->user();
        $admin = Admin::query()->where('email', $user->email)->first();
        if (empty($admin)) {
            $user = User::query()->updateOrCreate(
                [
                    'email' => $user->email,
                ],
                [
                    'name' => $user->name,
                    'email' => $user->email,
                    'avatar' => $user->avatar,
                    'created_at' => now(),
                ]
            );
        } else {
            $admin->update([
                'name' => $user->name,
                'avatar' => $user->avatar,
            ]);
            $user = $admin;
        }

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
            'role' => $user->role,
            'active' => $user->active,
            'created_at' => $user->created_at,
        ]);
    }

}
