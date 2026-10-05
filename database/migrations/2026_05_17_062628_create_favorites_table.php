<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('favorites', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->unsigned()->constrained('products')->onDelete('cascade');
            $table->foreignId('user_id')->unsigned()->constrained('users')->onDelete('cascade');
            $table->index(['product_id'], 'favorite_product');
            $table->index(['user_id'], 'user_fav');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('favorites');
    }
};
