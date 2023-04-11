<?php

namespace App\Http\Middleware\Role;

use App\Enums\AdminRole;
use App\Models\User;
use Closure;
use Illuminate\Http\Request;

class ProductWarehouseEmployee
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $check = authed();
        if (! in_array($check->role, [AdminRole::ADMIN, AdminRole::PRODUCT_WAREHOUSE], true)) {
            return redirect()->back();
        }

        return $next($request);
    }
}
