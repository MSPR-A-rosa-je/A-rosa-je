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
            Log::info('Creating missions table...');
        } catch (\Exception $e) {
        }
        Schema::create('missions', function (Blueprint $table) {
            $table->id();
            $table->dateTime('creation_date');
            $table->dateTime('start_date');
            $table->dateTime('end_date');
            $table->unsignedBigInteger('owner_id');
            $table->unsignedBigInteger('botanist_id');
            $table->json('candidates_list');
            $table->float('price');
            $table->text('description');
            $table->timestamps();

            $table->foreign('owner_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('botanist_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        try {
            Log::info('Dropping missions table...');
        } catch (\Exception $e) {
        }
        Schema::dropIfExists('missions');
    }
};
