<?php

namespace App\Models;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class merchant extends Authenticatable
{
    protected $guarded = [];

    protected $table = 'merchants';

    protected $hidden = [
        'password',
    ];

    public static function get_Fields(): array
    {

        $ary[] = [
            "name" => "first_name",
            "type" => "text",
            "label" => "الإسم الأول",
            "is_required" => true,
            "is_readonly" => false,
            "is_trans" => false,
        ];


        $ary[] = [
            "name" => "last_name",
            "type" => "text",
            "label" => "الإسم الثاني",
            "is_required" => false,
            "is_readonly" => false,
            "is_trans" => false
        ];

        $ary[] = [
            "name" => "email",
            "type" => "text",
            "label" => "الإيميل",
            "is_required" => true,
            "is_readonly" => false,
            "is_trans" => false
        ];

        $ary[] = [
            "name" => "password",
            "type" => "password",
            "label" => "كلمة المرور",
            "is_required" => true,
            "is_readonly" => false,
            "is_trans" => false
        ];

        $ary[] = [
            "name" => "known_number",
            "type" => "text",
            "label" => "رقم تواصل معروف",
            "is_required" => true,
            "is_readonly" => false,
            "is_trans" => false
        ];


        $ary[] = [
            "name" => "identity",
            "type" => "text",
            "label" => "رقم الهوية",
            "is_required" => true,
            "is_readonly" => false,
            "is_trans" => false
        ];

        $ary[] = [
            "name" => "phone",
            "type" => "text",
            "label" => "رقم التواصل",
            "is_required" => true,
            "is_readonly" => false,
            "is_trans" => false
        ];

        $ary[] = [
            "name" => "info",
            "type" => "text",
            "label" => "معلومات",
            "is_required" => true,
            "is_readonly" => false,
            "is_trans" => false
        ];

        $ary[] = [
            "name" => "commercial_register",
            "type" => "text",
            "label" => "السجل التجاري",
            "is_required" => true,
            "is_readonly" => false,
            "is_trans" => false
        ];

        $ary[] = [
            "name" => "image",
            "type" => "file",
            "label" => "الصورة الشخصية",
            "is_required" => true,
            "is_readonly" => false,
            "is_trans" => false
        ];
        return $ary;

    }

    public static function get_Address(): array
    {

        $ary[] = [
            "name" => "address_line1",
            "type" => "text",
            "label" => "العنوان سطر واحد",
            "is_required" => true,
            "is_readonly" => false,
            "is_trans" => false,
        ];


        $ary[] = [
            "name" => "address_line2",
            "type" => "text",
            "label" => "العنوان سطر اثنين",
            "is_required" => false,
            "is_readonly" => false,
            "is_trans" => false
        ];

        $ary[] = [
            "name" => "town",
            "type" => "text",
            "label" => "البلدة",
            "is_required" => false,
            "is_readonly" => false,
            "is_trans" => false
        ];

        $ary[] = [
            "name" => "state",
            "type" => "text",
            "label" => "الولاية",
            "is_required" => false,
            "is_readonly" => false,
            "is_trans" => false
        ];

        $ary[] = [
            "name" => "post_code",
            "type" => "text",
            "label" => "شفرة البريد",
            "is_required" => false,
            "is_readonly" => false,
            "is_trans" => false
        ];
        return $ary;

    }

    public function role()
    {
        return $this->belongsTo(role::class);
    }

}
