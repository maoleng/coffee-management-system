<?php

namespace App\Models;

class Admin extends Base
{
    public $timestamps = false;

    protected $fillable = [
        'name', 'email', 'avatar', 'role', 'active', 'created_at'
    ];

    protected $casts = [
        'active' => 'bool'
    ];

    public function getPrettyActiveAttribute(): string
    {
        return $this->active === true ?
            '<span class="badge rounded-pill badge-light-primary me-1">Active</span>' :
            '<span class="badge rounded-pill badge-light-secondary me-1">Cancelled</span>';
    }
}
