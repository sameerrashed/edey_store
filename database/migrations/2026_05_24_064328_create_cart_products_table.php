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
        Schema::create('cart_products', function (Blueprint $table) {
            $table->id();
            $table->integer('price');
            $table->integer('discount_price')->nullable();
            $table->integer('quantity')->default(1);
            $table->foreignId('cart_id')->unsigned()->nullable()->constrained('carts')->onDelete('cascade');
            $table->foreignId('product_id')->unsigned()->constrained('products')->onDelete('cascade');
            $table->foreignId('product_color_id')->unsigned()->constrained('product_colors')->onDelete('cascade');
            $table->foreignId('product_size_id')->unsigned()->constrained('product_sizes')->onDelete('cascade');
            $table->foreignId('product_engraving_id')->unsigned()->constrained('product_engravings')->onDelete('cascade');
            $table->index(['product_id'], 'product_cart');
            $table->index(['product_color_id'], 'product_color_cart');
            $table->index(['product_size_id'], 'product_size_cart');
            $table->index(['product_engraving_id'], 'product_engraving_cart');
            $table->index(['cart_id'], 'cart');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cart_products');
    }
};
