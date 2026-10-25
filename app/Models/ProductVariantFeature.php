<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductVariantFeature extends Model
{
    protected $fillable = [
        'product_variant_id',
        'feature_id',
        'value_id',
    ];

    protected $table = 'product_variant_features';

    public function variant()
    {
        return $this->belongsTo(ProductVariant::class, 'product_variant_id');
    }

    public function feature()
    {
        return $this->belongsTo(Feature::class);
    }
}
