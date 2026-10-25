<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ads extends Model
{
    protected $table = 'ads';

    protected $fillable = [
        'title',
        'image',
        'link_url'
    ];

    public static function get_Fields(): array
    {

        $ary[] = [
            "name" => "title",
            "type" => "text",
            "label" => "title",
            "is_required" => true,
            "is_readonly" => false,
            "is_trans" => true
        ];


        $ary[] = [
            "name" => "link_url",
            "type" => "text",
            "label" => "link_url",
            "is_required" => false,
            "is_readonly" => false,
            "is_trans" => false
        ];

        $ary[] = [
            "name" => "image",
            "type" => "file",
            "label" => "image",
            "is_required" => true,
            "is_readonly" => false,
            "is_trans" => false
        ];

        return $ary;

    }
}
