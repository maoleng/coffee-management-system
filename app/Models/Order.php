<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Order extends Base
{
    public $timestamps = false;

    protected $fillable = [
        'user_id', 'name', 'address', 'phone', 'status', 'is_paid', 'total', 'admin_id', 'promotion_id', 'ordered_at',
    ];

    public function orderProducts(): BelongsToMany
    {
        return $this->belongsToMany(Product::class, 'order_products')->withPivot([
            'name',
            'amount',
            'price',
        ]);
    }

}
