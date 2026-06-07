<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class store extends Model
{
    protected $guarded = [];

    public static function get_Fields(): array
    {

        $ary[] = [
            'name' => 'name',
            'type' => 'name',
            'label' => 'title',
            'is_required' => true,
            'is_readonly' => false,
            'is_trans' => true,
        ];

        $ary[] = [
            'name' => 'phone',
            'type' => 'text',
            'label' => 'phone',
            'is_required' => false,
            'is_readonly' => false,
            'is_trans' => false,
        ];

        $ary[] = [
            'name' => 'image',
            'type' => 'file',
            'label' => 'image',
            'is_required' => true,
            'is_readonly' => false,
            'is_trans' => false,
        ];

        $ary[] = [
            'name' => 'banner',
            'type' => 'text',
            'label' => 'banner',
            'is_required' => false,
            'is_readonly' => false,
            'is_trans' => false,
        ];

        $ary[] = [
            'name' => 'country',
            'type' => 'text',
            'label' => 'country',
            'is_required' => false,
            'is_readonly' => false,
            'is_trans' => false,
        ];

        $ary[] = [
            'name' => 'city',
            'type' => 'text',
            'label' => 'city',
            'is_required' => false,
            'is_readonly' => false,
            'is_trans' => false,
        ];

        $ary[] = [
            'name' => 'facebook_link',
            'type' => 'text',
            'label' => 'facebook_link',
            'is_required' => false,
            'is_readonly' => false,
            'is_trans' => false,
        ];

        $ary[] = [
            'name' => 'whatsapp_link',
            'type' => 'text',
            'label' => 'whatsapp_link',
            'is_required' => false,
            'is_readonly' => false,
            'is_trans' => false,
        ];

        $ary[] = [
            'name' => 'x_link',
            'type' => 'text',
            'label' => 'x_link',
            'is_required' => false,
            'is_readonly' => false,
            'is_trans' => false,
        ];

        $ary[] = [
            'name' => 'instagram_link',
            'type' => 'text',
            'label' => 'instagram_link',
            'is_required' => false,
            'is_readonly' => false,
            'is_trans' => false,
        ];

        return $ary;

    }

    public function payment_methods()
    {
        return $this->belongsToMany(payment_method::class, 'payment_store');
    }

    public function requestUpgradeMerchant()
    {
        return $this->belongsTo(requestUpgradeMerchant::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');

    }

    public function paymentMethods()
    {
        return $this->belongsToMany(
            payment_method::class,
            'payment_store',
            'store_id',
            'payment_method_id'
        );
    }
}
