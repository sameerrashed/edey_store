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
            $table->string('product_name');
            $table->string('image');
            $table->longText('description');
            $table->float('price');
            $table->bigInteger('count');
            $table->string('color')->nullable();
            $table->string('size')->nullable();
            $table->string('engraving')->nullable();
            $table->bigInteger('sku');
            $table->integer('rate');
            $table->float('discount');
            $table->longText('comments')->nullable();
            $table->integer('category_id');
            $table->integer('merchant_id');
            $table->timestamps();
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
