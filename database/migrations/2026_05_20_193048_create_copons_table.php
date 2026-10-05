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
        Schema::create('copons', function (Blueprint $table) {
            $table->id();
            $table->string('code', 255);
            $table->string('name', 255);
            $table->float('discount_percentage');
            $table->integer('count');
            $table->date('start_date');
            $table->date('end_date');
            $table->integer('status')->default(1);
            $table->foreignId('store_id')->unsigned()->nullable()->constrained('stores')->onDelete('cascade');
            $table->unique(['code'], 'code');
            $table->index(['store_id'], 'copon_store_rel');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('copons');
    }
};
