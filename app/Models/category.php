<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    protected $fillable = [
        'category_name',
        'photo_cover',
        'icon',
        'status',
        'show_in_intro',
    ];

    public static function get_Fields(): array
    {

        $ary[] = [
            'name' => 'category_name',
            'type' => 'text',
            'label' => 'category_name',
            'is_required' => true,
            'is_readonly' => false,
            'is_trans' => false,
        ];

        $ary[] = [
            'name' => 'status',
            'type' => 'text',
            'label' => 'status',
            'is_required' => false,
            'is_readonly' => false,
            'is_trans' => false,
        ];

        $ary[] = [
            'name' => 'icon',
            'type' => 'file',
            'label' => 'icon',
            'is_required' => true,
            'is_readonly' => false,
            'is_trans' => false,
        ];

        $ary[] = [
            'name' => 'photo_cover',
            'type' => 'file',
            'label' => 'photo_cover',
            'is_required' => true,
            'is_readonly' => false,
            'is_trans' => false,
        ];

        return $ary;

    }

    public function intro()
    {
        return $this->belongsTo(intro::class);
    }

    public function products()
    {
        return $this->belongsToMany(product::class, 'product_category');
    }

    public function sizes()
    {
        return $this->belongsToMany(size::class);
    }
}
