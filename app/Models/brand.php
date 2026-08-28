<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class brand extends Model
{
    protected $gurded = [];

    public static function get_Fields(): array
    {

        $ary[] = [
            'name' => 'name',
            'type' => 'text',
            'label' => 'إسم الماركة',
            'is_required' => true,
            'is_readonly' => false,
            'is_trans' => false,
        ];

        return $ary;

    }
}
