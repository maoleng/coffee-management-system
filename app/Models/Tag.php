<?php

namespace App\Models;

class Tag extends Base
{
    public $timestamps = false;

    protected $fillable = [
        'name',
    ];

}
