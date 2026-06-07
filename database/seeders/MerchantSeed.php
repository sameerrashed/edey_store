<?php

namespace Database\Seeders;

use App\Models\merchant;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MerchantSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        merchant::updateOrCreate([
            "first_name" => "admin",
            "last_name" => "admin",
            "password" => bcrypt("12345678"),
            "email" => "admin@admin.com",
            'image' => 'gy5FuirCbX7nWx67koLef70h573ojfY9SNDN7865.jpg',
            'phone' => '5465465',
            'commercial_register' => '3333',
        ]);
    }
}
