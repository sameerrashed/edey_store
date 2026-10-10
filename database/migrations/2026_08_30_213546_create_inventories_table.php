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
        Schema::create('inventories', function (Blueprint $table) {
            $table->id()->unsigned();
            $table->foreignId('product_id')->unsigned()->constrained('products')->onDelete('cascade');
            $table->integer('quantity');
            $table->integer('min_quantity')->default(1);
            $table->integer('max_quantity')->default(99);
            $table->integer('stock_status');
            $table->index(['product_id'], 'Inventory_product');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inventories');
    }
};
