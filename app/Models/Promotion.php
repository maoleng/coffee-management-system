<?php

namespace App\Models;

class Promotion extends Base
{
    public $timestamps = false;

    protected $fillable = [
        'name', 'description', 'code', 'percent', 'active', 'created_at', 'expired_at',
    ];

}
