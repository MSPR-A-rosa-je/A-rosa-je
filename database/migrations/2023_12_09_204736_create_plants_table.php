<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Log;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        try {
            Log::info('Creating plants table...');
        } catch (\Exception $e) {
            Log::error($e);
        }
        Schema::create('plants', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('owner_id');
            $table->string('specie_name');
            $table->string('location');
            $table->string('url_photo')->nullable();
            $table->string('status');
            $table->text('description')->nullable();
            $table->timestamps();
            $table->foreign('owner_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        try {
            Log::info('Dropping plants table...');
        } catch (\Exception $e) {
            Log::error($e);

        }
        Schema::dropIfExists('plants');
    }
};
