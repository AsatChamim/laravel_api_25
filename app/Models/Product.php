<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    protected $fillable = [
        'product_category_id',
        'name',
        'code',
        'description',
    ];

    /**
     * Relasi dengan ProductCategorie
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(ProductCategorie::class, 'product_category_id');
    }
    /**
     * Relasi dengan ProductVarian
     */
    public function varians(): HasMany
    {
        return $this->hasMany(ProductVarian::class, 'product_id');
    }
}
