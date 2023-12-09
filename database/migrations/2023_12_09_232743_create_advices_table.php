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
        Schema::create('advices', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->dateTime('creation_date');
            $table->text('description');
            $table->unsignedBigInteger('owner_id');
            $table->integer('like_number')->default(0);
            $table->timestamps();

            $table->foreign('owner_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('advices');
    }
};
