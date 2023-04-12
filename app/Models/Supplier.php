<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;

class Supplier extends Base
{
    public $timestamps = false;

    protected $fillable = [
        'name', 'address', 'phone',
    ];

    public function imports(): HasMany
    {
        return $this->hasMany(Import::class);
    }
}
