<?php

namespace App\Models;

class Image extends Base
{
    public $timestamps = false;

    protected $fillable = [
        'source', 'size', 'product_id',
    ];

}
