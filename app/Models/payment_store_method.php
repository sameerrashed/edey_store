<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class payment_store_method extends Model
{
    protected $fillable = [
        'store_id', 'payment_id',
    ];

    public function paymentMethod()
    {
        return $this->belongsTo(
            payment_method::class,
            'payment_id',
            'id'
        );
    }
}
