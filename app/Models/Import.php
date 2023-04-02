<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Import extends Base
{
    public $timestamps = false;

    protected $fillable = [
        'total', 'admin_id', 'supplier_id', 'created_at',
    ];

    public function importProducts(): BelongsToMany
    {
        return $this->belongsToMany(Product::class, 'import_products')->withPivot([
            'amount',
            'price',
        ]);
    }
}
