<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class size extends Model
{
    protected $fillable = [
        'name',
        'category_id',
    ];

    public static function get_Fields(): array
    {

        $ary[] = [
            "name" => "name",
            "type" => "text",
            "label" => "المقاس",
            "is_required" => true,
            "is_readonly" => false,
            "is_trans" => true
        ];

        $ary[] = [
            "name" => "category_id",
            "type" => "text",
            "label" => "الصنف المطلوب",
            "is_required" => true,
            "is_readonly" => false,
            "is_trans" => true
        ];

        return $ary;

    }

    public function category()
    {
        return $this->belongsTo(category::class);
    }
}
