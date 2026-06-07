<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class cart_product extends Model
{
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function cart()
    {
        return $this->belongsTo(cart::class);
    }
}
