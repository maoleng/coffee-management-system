<?php

namespace App\Models;

class Image extends Base
{
    public $timestamps = false;

    protected $fillable = [
        'source', 'product_id',
    ];

    public function getPathAttribute()
    {
        return str_starts_with($this->source, 'http') ? $this->source : "storage/$this->source";
    }
}
