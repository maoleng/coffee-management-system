<?php

namespace App\Models;

use Carbon\Carbon;

class Promotion extends Base
{
    public $timestamps = false;

    protected $fillable = [
        'name', 'description', 'code', 'percent', 'active', 'created_at', 'expired_at',
    ];

    protected $casts = [
        'active' => 'bool'
    ];

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function getInputExpiredAtAttribute(): string
    {
        return Carbon::make($this->expired_at)->format('Y-m-d H:i');
    }

    public function getPrettyActiveAttribute(): string
    {
        return $this->active === true ?
            '<span class="badge rounded-pill badge-light-primary me-1">Active</span>' :
            '<span class="badge rounded-pill badge-light-secondary me-1">Inactive</span>';
    }
}
