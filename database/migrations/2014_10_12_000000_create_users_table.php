<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        try {
            Log::info('Creating users table...');
        } catch (\Exception $e) {
            Log::error($e);
        }
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->boolean('is_botanist');
            $table->boolean('is_admin');
            $table->dateTime('creation_date');
            $table->dateTime('botanist_since')->nullable();
            $table->string('pseudo');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('phone_number')->nullable();
            $table->string('mail')->unique();
            $table->dateTime('birth_date');
            $table->string('url_picture')->nullable();
            $table->string('zip_code')->nullable();
            $table->string('city')->nullable();
            $table->text('address')->nullable();
            $table->string('hashed_password');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        try {
            Log::info('Dropping users table...');
        } catch (\Exception $e) {
            Log::error($e);
        }
        Schema::dropIfExists('users');
    }
};
