<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class statistic extends Model
{
    protected $fillable = [
        'image',
        'title',
        'num_of',
    ];

    public static function get_Fields(): array
    {

        $ary[] = [
            'name' => 'title',
            'type' => 'text',
            'label' => 'title',
            'is_required' => true,
            'is_readonly' => false,
            'is_trans' => true,
        ];

        $ary[] = [
            'name' => 'image',
            'type' => 'file',
            'label' => 'image',
            'is_required' => true,
            'is_readonly' => false,
            'is_trans' => false,
        ];

        return $ary;

    }
}
