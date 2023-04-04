<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;

class User extends Base
{
    public $timestamps = false;

    protected $fillable = [
        'name', 'email', 'avatar', 'created_at'
    ];

    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }

}
