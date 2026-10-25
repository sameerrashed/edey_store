<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class role extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function merchant()
    {
        return $this->belongsTo(merchant::class);
    }

    const RoleName = [
        'Admin' => '1',
        'Merchant' => '2',
        'Editor' => '3',
        'User' => '4',
    ];
}
