<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Product extends Base
{
    public $timestamps = false;

    protected $fillable = [
        'name', 'price', 'description', 'information', 'expire_month', 'category_id',
    ];

    protected $casts = [
        'information' => 'json'
    ];

    protected $appends = [
        'left'
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function importProducts(): BelongsToMany
    {
        return $this->belongsToMany(Import::class, 'import_products')->withPivot([
            'amount',
            'price',
        ]);
    }

    public function orderProducts(): BelongsToMany
    {
        return $this->belongsToMany(Order::class, 'order_products')->withPivot([
            'name',
            'amount',
            'price',
        ]);
    }

    public function getLeftAttribute(): array
    {
        $orders = $this->orderProducts;
        $spend = 0;
        foreach ($orders as $order) {
            $spend += $order->pivot->amount;
        }
        $imports = $this->importProducts;
        $collect = 0;
        foreach ($imports as $import) {
            $collect += $import->pivot->amount;
        }
        $last_import_date = $imports->max('created_at');
        $date_left = Carbon::create(now()->addMonths($this->expire_month))->diffInDays($last_import_date, 5);

        return [
            'amount' => $collect - $spend,
            'date' => $date_left . ' days',
        ];
    }
}
