<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class subscription extends Model
{
    protected $fillable = [
        'email',
    ];

    public static function get_Fields(): array
    {

        $ary[] = [
            "name" => "email",
            "type" => "text",
            "label" => "email",
            "is_required" => true,
            "is_readonly" => false,
            "is_trans" => true
        ];

        return $ary;

    }
}
