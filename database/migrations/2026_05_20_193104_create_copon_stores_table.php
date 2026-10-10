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
        Schema::create('copon_stores', function (Blueprint $table) {
            $table->id()->unsigned();
            $table->foreignId('copon_id')->unsigned()->constrained('copons')->onDelete('cascade');
            $table->foreignId('store_id')->unsigned()->constrained('stores')->onDelete('cascade');
            $table->index(['copon_id'], 'copon_store');
            $table->index(['store_id'], 'store_copon');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('copon_stores');
    }
};
