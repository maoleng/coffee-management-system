<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Tag extends Base
{
    public $timestamps = false;

    protected $fillable = [
        'name',
    ];

    public function postTags(): BelongsToMany
    {
        return $this->belongsToMany(Post::class, 'post_tags');
    }
}
