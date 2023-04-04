<?php

namespace App\Models;

use App\Enums\SupportStatus;
use Illuminate\Support\Str;

class Support extends Base
{
    public $timestamps = false;

    protected $fillable = [
        'name', 'email', 'content', 'response', 'status', 'admin_id', 'created_at',
    ];

    public function getLimitContentAttribute(): string
    {
        return Str::limit($this->content, 22);
    }

    public function getPrettyStatusAttribute(): string
    {
        return match ($this->status) {
            SupportStatus::SUCCESSFUL => '<span class="badge rounded-pill badge-light-primary me-1">Closed</span>',
            SupportStatus::UNPROCESSED => '<span class="badge rounded-pill badge-light-secondary me-1">Unprocessed</span>',
            SupportStatus::FILTERED => '<span class="badge rounded-pill badge-light-warning me-1">Filtered</span>',
        };
    }
}
