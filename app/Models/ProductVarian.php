<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProductVarian extends Model
{
    protected $fillable = [
        'product_id',
        'name',
        'description',
        'price',
        'stock',
    ];

    /**
     * Relasi dengan Product
     */
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
