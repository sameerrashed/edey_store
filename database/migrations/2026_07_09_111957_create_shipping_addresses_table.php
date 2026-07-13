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
        Schema::create('shipping_addresses', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')->unsigned()->cascadeOnDelete();

            $table->string('email');
            $table->string('country')->default('المملكة العربية السعودية');

            $table->string('full_name');

            $table->string('street_address');

            $table->string('province');      // المحافظة
            $table->string('city');          // المدينة

            $table->boolean('is_default')->default(true);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shipping_addresses');
    }
};
