<?php

namespace App\Models;

use App\Enums\PostCategory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Str;

class Post extends Base
{
    public $timestamps = false;

    protected $fillable = [
        'title', 'content', 'banner', 'category', 'admin_id', 'created_at',
    ];

    public function postTags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class, 'post_tags');
    }

    public function getLimitTitleAttribute(): string
    {
        return Str::limit($this->title, 40);
    }

    public function getRawContentAttribute(): string
    {
        $raw = preg_replace('/<.*>/U', '', $this->content);

        return Str::limit($raw);
    }

    public function getPrettyCategoryAttribute(): string
    {
        return PostCategory::getDescription($this->category);
    }
}
