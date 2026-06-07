<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class engraving extends Model
{
    protected $fillable = [
        'name',
        'category_id',
    ];

    public static function get_Fields(): array
    {

        $ary[] = [
            'name' => 'avatar',
            'type' => 'file',
            'label' => 'أفاتار النقش',
            'is_required' => true,
            'is_readonly' => false,
            'is_trans' => true,
        ];

        $ary[] = [
            'name' => 'name',
            'type' => 'text',
            'label' => 'إسم النقش',
            'is_required' => true,
            'is_readonly' => false,
            'is_trans' => true,
        ];

        $ary[] = [
            'name' => 'category_id',
            'type' => 'text',
            'label' => 'الصنف المطلوب',
            'is_required' => true,
            'is_readonly' => false,
            'is_trans' => true,
        ];

        return $ary;

    }

    public function category()
    {
        return $this->belongsTo(category::class);
    }
}
