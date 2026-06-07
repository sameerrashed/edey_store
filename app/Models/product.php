<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    protected $fillable = [
        'product_name',
        'avatar',
        'description',
        'price',
        'price_after',
        'sku',
        'comments',
        'count',
        'rate',
        'discount',
        'category_id',
        'user_id',
    ];

    public static function get_Fields(): array
    {

        $ary[] = [
            'name' => 'avatar',
            'type' => 'file',
            'label' => 'صورة المنتج',
            'is_required' => true,
            'is_readonly' => false,
            'is_trans' => false,
        ];

        $ary[] = [
            'name' => 'product_name',
            'type' => 'text',
            'label' => 'اسم المنتج',
            'is_required' => true,
            'is_readonly' => false,
            'is_trans' => false,
        ];

        $ary[] = [
            'name' => 'description',
            'type' => 'text',
            'label' => 'وصف المنتج',
            'is_required' => false,
            'is_readonly' => false,
            'is_trans' => false,
        ];

        $ary[] = [
            'name' => 'price',
            'type' => 'text',
            'label' => 'سعر المنتج',
            'is_required' => true,
            'is_readonly' => false,
            'is_trans' => false,
        ];

        $ary[] = [
            'name' => 'price_after',
            'type' => 'text',
            'label' => 'سعر المنتج',
            'is_required' => true,
            'is_readonly' => false,
            'is_trans' => false,
        ];

        $ary[] = [
            'name' => 'count',
            'type' => 'text',
            'label' => 'الكمية المتاحة',
            'is_required' => true,
            'is_readonly' => false,
            'is_trans' => false,
        ];

        $ary[] = [
            'name' => 'discount',
            'type' => 'text',
            'label' => 'الكمية المتاحة',
            'is_required' => true,
            'is_readonly' => false,
            'is_trans' => false,
        ];

        return $ary;

    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function categories()
    {
        return $this->belongsToMany(category::class, 'product_category');
    }

    public function colors()
    {
        return $this->belongsToMany(color::class, 'product_color');
    }

    public function engravings()
    {
        return $this->belongsToMany(engraving::class, 'product_engraving');
    }

    public function sizes()
    {
        return $this->belongsToMany(size::class, 'product_size');
    }

    public function store()
    {
        return $this->belongsTo(store::class);
    }

    public function relateds()
    {
        return $this->belongsToMany(
            Product::class,
            'related_products',
            'product_id',
            'related_id',
            'id',
            'id'
        );
    }
}
