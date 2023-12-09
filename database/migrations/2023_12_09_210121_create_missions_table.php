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

            // Clés étrangères
            $table->foreign('owner_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('botanist_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('missions');
    }
};
