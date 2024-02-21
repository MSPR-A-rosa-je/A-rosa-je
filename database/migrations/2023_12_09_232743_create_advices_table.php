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
            Log::info('Creating advices table...');
        } catch (\Exception $e) {
            Log::error($e);
        }
        Schema::create('advices', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->dateTime('creation_date');
            $table->text('description');
            $table->unsignedBigInteger('owner_id');
            $table->integer('like_number')->default(0);
            $table->timestamps();

            $table->foreign('owner_id')->references('id')->on('users')->onDelete('cascade');;
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        try {
            Log::info('Dropping advices table...');
        } catch (\Exception $e) {
            Log::error($e);
        }
        Schema::dropIfExists('advices');
    }
};
