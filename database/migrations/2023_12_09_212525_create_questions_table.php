<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        try {
            Log::info('Creating questions table...');
        } catch (\Exception $e) {
            Log::error($e);
        }
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->timestamp('creation_date');
            $table->unsignedBigInteger('owner_id');
            $table->foreign('owner_id')->references('id')->on('users');
            $table->timestamps();
        });

        Schema::create('answer_question', function (Blueprint $table) {
            $table->unsignedBigInteger('question_id');
            $table->unsignedBigInteger('answer_id');
            $table->foreign('question_id')->references('id')->on('questions')->onDelete('cascade');
            $table->foreign('answer_id')->references('id')->on('answers')->onDelete('cascade');
            $table->primary(['question_id', 'answer_id']);
        });
    }

    public function down()
    {
        try {
            Log::info('Dropping questions table...');
        } catch (\Exception $e) {
            Log::error($e);
        }
        Schema::dropIfExists('answer_question');
        Schema::dropIfExists('questions');
    }
};
