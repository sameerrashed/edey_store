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
        Schema::create('request_upgrade_merchants', function (Blueprint $table) {
            $table->id()->unsigned();
            $table->foreignId('user_id')->unsigned()->constrained('users')->onDelete('cascade');
            $table->foreignId('store_id')->unsigned()->constrained('stores')->onDelete('cascade');
            $table->integer('status')->default(1);
            $table->longText('reason')->nullable();
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('accepted_at')->nullable();
            $table->timestamp('rejected_at')->nullable();
            $table->index(['store_id'], 'store_upgrade');
            $table->index(['user_id'], 'user_upgrade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('request_upgrade_merchants');
    }
};
