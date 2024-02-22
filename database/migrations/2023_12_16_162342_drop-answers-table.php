<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        try {
            Log::info('Dropping answers table...');
        } catch (\Exception $e) {
            Log::error($e);
        }
        Schema::dropIfExists('answers');
    }

    public function down(): void
    {
        try {
            Log::info('Creating answers table...');
        } catch (\Exception $e) {
            Log::error($e);
        }
        Schema::create('answers', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('like_number')->default(0);
            $table->unsignedBigInteger('question_id');
            $table->foreign('question_id')->references('id')->on('questions');
            $table->text('description');
            $table->unsignedBigInteger('owner_id');
            $table->foreign('owner_id')->references('id')->on('users');
        });
    }
};
