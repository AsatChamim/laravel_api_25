<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ProductCategorie extends Model
{
    protected $table = 'product_categories';
    
    protected $fillable = [
        'name',
        'description',
    ];

    /**
     * Relasi dengan Product
     */
    public function products(): HasMany
    {
        return $this->hasMany(Product::class, 'product_category_id');
    }
}

