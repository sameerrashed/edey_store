<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class country extends Model
{
    public function provinces()
    {
        return $this->hasMany(province::class);
    }

    public function cities()
    {
        return $this->hasMany(City::class);
    }
}
