<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class intro extends Model
{
    protected $fillable = [
        'category_id',
    ];

    public static function get_Fields(): array
    {

        $ary[] = [
            "name" => "category_id",
            "type" => "text",
            "label" => "category_id",
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
