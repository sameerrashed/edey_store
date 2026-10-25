<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class favorite extends Model
{
    protected $table = 'favorites';

    public function product()
    {
        return $this->belongsTo(product::class);

    }
}
