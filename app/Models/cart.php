<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class cart extends Model
{
    public function product()
    {
        return $this->belongsTo(product::class);
    }

    public function store()
    {
        return $this->belongsTo(store::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function cart_products()
    {
        return $this->hasMany(cart_product::class, 'cart_id');
    }
}
