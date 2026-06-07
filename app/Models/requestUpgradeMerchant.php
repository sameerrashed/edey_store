<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class requestUpgradeMerchant extends Model
{
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function store()
    {
        return $this->belongsTo(store::class);
    }

    const status = [
        '1' => 'Pending',
        '2' => 'Accepted',
        '3' => 'Rejected',
    ];

    const StatusName = [
        'Pending' => '1',
        'Accepted' => '2',
        'Rejected' => '3',
    ];
}
