<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class color extends Model
{
    protected $fillable = [
        'name',
        'color',
    ];

    public static function get_Fields(): array
    {

        $ary[] = [
            'name' => 'name',
            'type' => 'text',
            'label' => 'إسم اللون(التفاصيل)',
            'is_required' => true,
            'is_readonly' => false,
            'is_trans' => true,
        ];

        $ary[] = [
            'name' => 'color',
            'type' => 'color',
            'label' => 'إضافة درجة اللون',
            'is_required' => true,
            'is_readonly' => false,
            'is_trans' => false,
        ];

        return $ary;

    }

    public function category()
    {
        return $this->belongsTo(category::class);
    }
}
