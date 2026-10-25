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
        Schema::create('payment_store_methods', function (Blueprint $table) {
            $table->id()->unsigned();
            $table->foreignId('payment_id')->unsigned()->constrained('payment_methods')->onDelete('cascade');
            $table->foreignId('store_id')->unsigned()->constrained('stores')->onDelete('cascade');
            $table->index(['payment_id'], 'payment_store_name');
            $table->index(['store_id'], 'store_payment');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payment_store_methods');
    }
};
