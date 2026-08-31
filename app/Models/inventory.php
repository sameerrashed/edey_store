<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class inventory extends Model
{
    public function product()
    {
        return $this->belongsTo(product::class);
    }
}
