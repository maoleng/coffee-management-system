<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Order extends Base
{
    public $timestamps = false;

    protected $fillable = [
        'user_id', 'name', 'address', 'email', 'phone', 'status', 'is_paid', 'is_sent_bill', 'total', 'admin_id', 'promotion_id', 'ordered_at',
    ];

    public function orderProducts(): BelongsToMany
    {
        return $this->belongsToMany(Product::class, 'order_products')->withPivot([
            'name',
            'amount',
            'price',
        ]);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function getPrettyTotalAttribute(): string
    {
        return number_format($this->total, 0, '', ',');
    }

}
