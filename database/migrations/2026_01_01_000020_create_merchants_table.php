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
        Schema::create('merchants', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email')->unique();
            $table->string('password');

            $table->string('phone')->nullable();
            $table->string('identity')->nullable();
            $table->text('info')->nullable();
            $table->string('commercial_register')->nullable();
            $table->string('known_number')->nullable();
            $table->string('image')->nullable();

            $table->string('address_line1')->nullable();
            $table->string('address_line2')->nullable();

            $table->foreignId('role_id')->nullable()->constrained('roles')->nullOnDelete();

            $table->string('town')->nullable();
            $table->string('state')->nullable();
            $table->string('post_code')->nullable();
            $table->string('country')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('merchants');
    }
};
