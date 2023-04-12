<?php

namespace App\Http\Controllers;

use App\Enums\OrderStatus;
use App\Http\Requests\ProductRequest;
use App\Http\Requests\PromotionRequest;
use App\Models\Category;
use App\Models\Image;
use App\Models\Import;
use App\Models\Order;
use App\Models\Product;
use App\Models\Promotion;
use App\Models\Supplier;
use Carbon\Carbon;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PromotionController extends Controller
{

    public function index(Request $request): View
    {
        $data = $request->all();
        $builder = Promotion::query();
        if (isset($data['active'])) {
            $builder->where('active', $data['active']);
        }
        if (isset($data['created_at'])) {
            $split = explode(',', $data['created_at']);
            $builder->whereBetween('created_at', [$split[0], $split[1]]);
        }
        if (isset($data['expired_at'])) {
            $split = explode(',', $data['expired_at']);
            $builder->whereBetween('expired_at', [$split[0], $split[1]]);
        }
        if (isset($data['q'])) {
            $builder->where(function ($q) use ($data) {
                $q->orWhere('name', 'LIKE', "%{$data['q']}%")
                    ->orWhere('description', 'LIKE', "%{$data['q']}%")
                    ->orWhere('code', 'LIKE', "%{$data['q']}%")
                    ->orWhere('percent', 'LIKE', "%{$data['q']}%")
                    ->orWhere('created_at', 'LIKE', "%{$data['q']}%")
                    ->orWhere('expired_at', 'LIKE', "%{$data['q']}%");
            });
        }
        $promotions = $builder->orderByDesc('active')->orderByDesc('created_at')->paginate(10);

        return view('admin.promotion.index', [
            'promotions' => $promotions,
        ]);
    }

    public function create(): View
    {
        return view('admin.promotion.create');
    }

    public function edit(Promotion $promotion): View
    {
        return view('admin.promotion.edit', [
            'promotion' => $promotion,
        ]);
    }

    public function store(PromotionRequest $request): RedirectResponse
    {
        $data = $request->all();

        Promotion::query()->create([
            'name' => $data['name'],
            'description' => $data['description'],
            'code' => $data['code'],
            'percent' => $data['percent'],
            'active' => $data['active'],
            'created_at' => now(),
            'expired_at' => $data['expired_at'],
        ]);

        return redirect()->route('admin.promotion.index');
    }

    public function update(PromotionRequest $request, Promotion $promotion): RedirectResponse
    {
        $data = $request->all();

        $promotion->update([
            'name' => $data['name'],
            'description' => $data['description'],
            'code' => $data['code'],
            'percent' => $data['percent'],
            'active' => $data['active'],
            'expired_at' => $data['expired_at'],
        ]);

        return redirect()->route('admin.promotion.index');
    }


}
