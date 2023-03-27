<?php

namespace App\Models;

class Product extends Base
{
    public $timestamps = false;

    protected $fillable = [
        'name', 'price', 'description', 'information', 'expire_month', 'category_id',
    ];

}
