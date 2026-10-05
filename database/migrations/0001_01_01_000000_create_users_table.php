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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('first_name', 255);
            $table->string('last_name', 255);
            $table->string('email', 255)->nullable();
            $table->string('password', 255)->nullable();
            $table->longText('image')->default('profil_pic.svg');
            $table->string('phone', 55)->nullable();
            $table->foreignId('role_id')->unsigned()->default(4);
            $table->bigInteger('identity')->nullable();
            $table->longText('info')->nullable();
            $table->longText('commercial_register')->nullable();
            $table->string('known_number', 255)->nullable();
            $table->integer('status')->default(0);
            $table->string('city', 255)->nullable();
            $table->string('remember_token', 100)->nullable();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->timestamp('last_login_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->unique(['email'], 'users_email_unique');
            $table->index(['role_id'], 'userRole');
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
