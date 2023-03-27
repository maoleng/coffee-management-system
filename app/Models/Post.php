<?php

namespace App\Models;

class Post extends Base
{
    public $timestamps = false;

    protected $fillable = [
        'title', 'content', 'category', 'admin_id', 'created_at',
    ];

}
