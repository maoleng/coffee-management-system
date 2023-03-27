<?php

namespace App\Models;

class Import extends Base
{
    public $timestamps = false;

    protected $fillable = [
        'total', 'admin_id', 'supplier_id', 'created_at',
    ];

}
