<?php

namespace App\Models;

class Support extends Base
{
    public $timestamps = false;

    protected $fillable = [
        'name', 'email', 'content', 'status', 'admin_id', 'created_at',
    ];

}
