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
            Log::info('Update users table...');
        } catch (\Exception $e) {
            Log::error($e);
        }

        Schema::table('users', function (Blueprint $table){
           $table->foreign('address_id')->references('id')->on('addresses')->onDelete('cascade');
           $table->dropColumn('zip_code');
           $table->dropColumn('city');
           $table->dropColumn('address');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        try {
            Log::info('Update users table...');
        } catch (\Exception $e) {
            Log::error($e);
        }

        Schema::table('users', function (Blueprint $table){
            $table->dropColumn('address_id');
            $table->integer('zip_code');
            $table->text('city');
            $table->text('address');
        });
    }
};
