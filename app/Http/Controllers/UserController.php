<?php

namespace App\Http\Controllers;

use App\Enums\AdminRole;
use App\Enums\OrderStatus;
use App\Http\Requests\AdminRequest;
use App\Http\Requests\PromotionRequest;
use App\Models\Admin;
use App\Models\Promotion;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function index(): View
    {
        $users = User::query()->orderByDesc('created_at')->paginate(10);

        return view('admin.user.index', [
            'users' => $users,
        ]);
    }

    public function show(Request $request): array
    {
        $user = User::query()->find($request->get('user_id'));
        if (empty($user)) {
            abort(404);
        }
        $orders = $user->orders->groupBy('status');

        return [
            'name' => $user->name,
            'cancelled' => count($orders->get(OrderStatus::CANCELLED)),
            'successful' => count($orders->get(OrderStatus::SUCCESSFUL)),
        ];
    }


}
