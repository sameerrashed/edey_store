<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class payment_method extends Model
{
    public function stores()
    {
        return $this->belongsToMany(
            Store::class,
            'payment_store',
            'payment_method_id',
            'store_id'
        );
    }
}
