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
        Schema::create('copon_user', function (Blueprint $table) {
            $table->id()->unsigned();
            $table->foreignId('copon_id')->unsigned()->constrained('copons')->onDelete('cascade');
            $table->foreignId('user_id')->unsigned()->constrained('users')->onDelete('cascade');
            $table->index(['copon_id'], 'copon_store_rel2');
            $table->index(['user_id'], 'copon_user_rel');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('copon_user');
    }
};
