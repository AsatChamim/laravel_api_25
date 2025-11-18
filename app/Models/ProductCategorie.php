<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductCategorie extends Model
{
    protected $table = 'product_categories';
    
    protected $fillable = [
        'name',
        'description',
    ];

    /**
     * Relasi dengan Product (jika ada)
     */
    public function products()
    {
        return $this->hasMany(Product::class, 'category_id');
    }
}

