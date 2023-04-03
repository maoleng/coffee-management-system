<?php

namespace App\Http\Controllers;

use App\Enums\AdminRole;
use App\Http\Requests\AdminRequest;
use App\Http\Requests\PromotionRequest;
use App\Models\Admin;
use App\Models\Promotion;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class AdminController extends Controller
{

    public function index(): View
    {
        $roles = AdminRole::getDescriptions();
        $admins = Admin::query()->orderByDesc('created_at')->paginate(10);

        return view('admin.admin.index', [
            'admins' => $admins,
            'roles' => $roles,
        ]);
    }

    public function cancel(Admin $admin): RedirectResponse
    {
        $admin->active = !$admin->active;
        $admin->save();

        return redirect()->route('admin.hrm.index');
    }

    public function store(AdminRequest $request): RedirectResponse
    {
        $data = $request->all();

        Admin::query()->create([
            'name' => '',
            'email' => $data['email'],
            'avatar' => '',
            'role' => $data['role'],
            'created_at' => now(),
        ]);

        return redirect()->route('admin.hrm.index');
    }


}
