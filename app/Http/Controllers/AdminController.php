<?php

namespace App\Http\Controllers;

use App\Enums\AdminRole;
use App\Http\Requests\AdminRequest;
use App\Http\Requests\PromotionRequest;
use App\Models\Admin;
use App\Models\Promotion;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function index(Request $request): View
    {
        $data = $request->all();
        $builder = Admin::query();
        if (isset($data['role'])) {
            $builder->where('role', $data['role']);
        }
        if (isset($data['created_at'])) {
            $split = explode(',', $data['created_at']);
            $builder->whereBetween('created_at', [$split[0], $split[1]]);
        }
        if (isset($data['q'])) {
            $builder->where(function ($q) use ($data) {
                $q->orWhere('name', 'LIKE', "%{$data['q']}%")
                    ->orWhere('email', 'LIKE', "%{$data['q']}%")
                    ->orWhere('created_at', 'LIKE', "%{$data['q']}%");
            });
        }

        $roles = AdminRole::getDescriptions();
        $admins = $builder->orderByDesc('created_at')->paginate(10);

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
        $data = $request->validated();

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
