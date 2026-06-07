<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class product_category extends Model
{
    protected $table = 'product_category';

    public function products()
    {
        return $this->belongsToMany(product::class, 'product_category');
    }
}
