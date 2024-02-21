<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        try {
            Log::info('Creating missions table...');
        } catch (\Exception $e) {
            Log::error($e);
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

    public function down(): void
    {
        try {
            Log::info('Dropping missions table...');
        } catch (\Exception $e) {
            Log::error($e);
        }
        Schema::dropIfExists('missions');
    }
};
