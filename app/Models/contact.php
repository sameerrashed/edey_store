<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class contact extends Model
{
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'message',
    ];

    public static function get_Fields(): array
    {

        $ary[] = [
            "name" => "first_name",
            "type" => "text",
            "label" => "first_name",
            "is_required" => true,
            "is_readonly" => false,
            "is_trans" => true
        ];


        $ary[] = [
            "name" => "last_name",
            "type" => "text",
            "label" => "last_name",
            "is_required" => false,
            "is_readonly" => false,
            "is_trans" => false
        ];

        $ary[] = [
            "name" => "email",
            "type" => "text",
            "label" => "email",
            "is_required" => true,
            "is_readonly" => false,
            "is_trans" => true
        ];

        $ary[] = [
            "name" => "message",
            "type" => "text",
            "label" => "message",
            "is_required" => true,
            "is_readonly" => false,
            "is_trans" => true
        ];

        return $ary;

    }
}
