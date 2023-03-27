<?php

namespace App\Models;

class Supplier extends Base
{
    public $timestamps = false;

    protected $fillable = [
        'name', 'address', 'phone',
    ];

}
