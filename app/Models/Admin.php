<?php

namespace App\Models;

class Admin extends Base
{
    public $timestamps = false;

    protected $fillable = [
        'name', 'email', 'avatar', 'role', 'active', 'created_at'
    ];

}
