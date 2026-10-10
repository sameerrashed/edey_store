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
        Schema::create('carts', function (Blueprint $table) {
            $table->id()->unsigned();
            $table->foreignId('coupon_id')->unsigned()->nullable()->constrained('coupons')->onDelete('cascade');
            $table->foreignId('user_id')->unsigned()->nullable()->constrained('users')->onDelete('cascade');
            $table->foreignId('store_id')->unsigned()->nullable()->constrained('stores')->onDelete('cascade');
            $table->double('tax')->default(0);
            $table->double('total_discount')->default(0);
            $table->index(['user_id'], 'cart_user');
            $table->index(['store_id'], 'cart_store');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carts');
    }
};
