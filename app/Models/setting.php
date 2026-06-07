<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class setting extends Model
{
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'image',
        'phone',
        'city',
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
            "name" => "phone",
            "type" => "text",
            "label" => "رقم التواصل",
            "is_required" => true,
            "is_readonly" => false,
            "is_trans" => false
        ];

        $ary[] = [
            "name" => "city",
            "type" => "text",
            "label" => "المدينة",
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
}
