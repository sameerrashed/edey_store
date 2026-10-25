<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductVariant extends Model
{
    protected $fillable = [
        'product_id',
        'variant_key',
        'stock_status',
        'quantity',
    ];

    protected $table = 'product_variants';

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function features()
    {
        return $this->hasMany(ProductVariantFeature::class);
    }
}
