<?php

namespace App\Models;

class Order extends Base
{
    public $timestamps = false;

    protected $fillable = [
        'user_id', 'name', 'address', 'phone', 'status', 'total', 'admin_id', 'promotion_id', 'ordered_at',
    ];

}
