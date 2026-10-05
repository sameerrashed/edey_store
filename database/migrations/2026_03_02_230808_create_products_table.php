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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('product_name', 55);
            $table->string('avatar', 255);
            $table->longText('description');
            $table->float('cost_price');
            $table->float('price');
            $table->float('price_after')->default(0);
            $table->string('sku', 255);
            $table->longText('comments')->nullable();
            $table->float('rate')->nullable();
            $table->integer('num_of_sales')->default(0);
            $table->float('discount')->default(0);
            $table->enum('status', ['0', '1', '', ''])->default('1');
            $table->foreignId('user_id')->unsigned()->constrained('users')->onDelete('cascade');
            $table->foreignId('type_id')->unsigned()->constrained('product_types')->onDelete('cascade');
            $table->foreignId('brand_id')->unsigned()->constrained('brands')->onDelete('cascade');
            $table->index(['user_id'], 'user_product');
            $table->index(['type_id'], 'product_type');
            $table->index(['brand_id'], 'brand_product');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
