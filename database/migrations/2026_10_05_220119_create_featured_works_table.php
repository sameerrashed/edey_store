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
        Schema::create('featured_works', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->unsigned()->constrained('products')->onDelete('cascade');
            $table->float('discount')->nullable();
            $table->index(['product_id'], 'product_feature');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('featured_works');
    }
};
