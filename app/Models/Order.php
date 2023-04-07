<?php

namespace App\Models;

use App\Enums\OrderStatus;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Order extends Base
{
    public $timestamps = false;

    protected $fillable = [
        'user_id', 'name', 'address', 'email', 'phone', 'status', 'is_paid', 'ship_fee', 'total', 'admin_id', 'promotion_id', 'ordered_at',
    ];

    protected $casts = [
        'is_paid' => 'boolean',
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

    public function promotion(): BelongsTo
    {
        return $this->belongsTo(Promotion::class);
    }

    public function admin(): BelongsTo
    {
        return $this->belongsTo(Admin::class);
    }

    public function getPrettyTotalAttribute(): string
    {
        return number_format($this->total, 0, '', ',');
    }

    public function getPrettyIsPaidAttribute(): string
    {
        return $this->is_paid === true ? 'Paid' : 'Not paid yet';
    }

    public function getStatusDescriptionAttribute(): string
    {
        return OrderStatus::getDescription($this->status);
    }

    public function getStatusBadgeAttribute(): string
    {
        return match ($this->status) {
            OrderStatus::UNPROCESSED => 'primary',
            OrderStatus::DELIVERING => 'info',
            OrderStatus::CANCELLED, OrderStatus::DESTROY => 'dark disabled',
            OrderStatus::DECLINE => 'danger disabled',
            OrderStatus::SUCCESSFUL => 'success disabled',
        };
    }

}
