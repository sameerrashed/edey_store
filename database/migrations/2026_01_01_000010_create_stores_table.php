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
        Schema::create('stores', function (Blueprint $table) {
            $table->id()->unsigned();
            $table->string('name', 55);
            $table->string('phone', 255);
            $table->string('icon', 255);
            $table->string('banner', 255);
            $table->string('country', 255);
            $table->string('city', 255);
            $table->string('whatsApp_number', 255);
            $table->string('facebook_link', 255)->nullable();
            $table->string('whatsapp_link', 255)->nullable();
            $table->string('x_link', 255)->nullable();
            $table->string('instagram_link', 255)->nullable();
            $table->foreignId('user_id')->unsigned();
            $table->string('bank_account_name', 255);
            $table->string('bank_name', 255);
            $table->longText('iban');
            $table->string('area', 255);
            $table->string('address', 255);
            $table->string('street', 255);
            $table->string('nearest_landmark', 255)->nullable();
            $table->integer('status')->default(0);
            $table->timestamps();
            $table->index(['facebook_link'], 'facebook_link');
            $table->index(['user_id'], 'user_store');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stores');
    }
};
