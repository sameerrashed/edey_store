<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class copon extends Model
{
    protected $fillable = [
        'name',
        'code',
        'discount_percentage',
        'count',
        'start_date',
        'end_date',
        'store_id',
    ];

    public static function get_Fields(): array
    {

        $ary[] = [
            'name' => 'name',
            'type' => 'text',
            'label' => 'إسم كود الخصم',
            'is_required' => true,
            'is_readonly' => false,
            'is_trans' => true,
        ];

        $ary[] = [
            'name' => 'discount_percentage',
            'type' => 'text',
            'label' => 'نسبة الخصم',
            'is_required' => true,
            'is_readonly' => false,
            'is_trans' => false,
        ];

        $ary[] = [
            'name' => 'count',
            'type' => 'text',
            'label' => 'عدد مرات الاستخدام',
            'is_required' => true,
            'is_readonly' => false,
            'is_trans' => false,
        ];

        $ary[] = [
            'name' => 'start_date',
            'type' => 'date',
            'label' => 'تاريخ بداية ',
            'is_required' => true,
            'is_readonly' => false,
            'is_trans' => false,
        ];

        $ary[] = [
            'name' => 'end_date',
            'type' => 'date',
            'label' => 'تاريخ نهاية الصلاحية',
            'is_required' => true,
            'is_readonly' => false,
            'is_trans' => false,
        ];

        return $ary;

    }
}
