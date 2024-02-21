<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        try {
            Log::info('Refactoring missions table...');
        } catch (\Exception $e) {
            Log::error($e);
        }
        Schema::dropIfExists('missions');

        Schema::create('missions', function (Blueprint $table) {
            $table->id();
            $table->dateTime('creation_date');
            $table->dateTime('start_date');
            $table->dateTime('end_date');
            $table->unsignedBigInteger('owner_id');
            $table->json('candidates_list');
            $table->float('price');
            $table->text('description');
            $table->timestamps();
            $table->unsignedBigInteger('gardien_id');
            $table->integer('number_of_sessions')->unsigned()->nullable();
            $table->json('plants_list')->nullable();
            $table->foreign('gardien_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('owner_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('missions');
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
};
