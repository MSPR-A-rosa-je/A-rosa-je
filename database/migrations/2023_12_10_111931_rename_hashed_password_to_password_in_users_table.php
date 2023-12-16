<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Log;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        try {
            Log::info('Renaming users password...');
        } catch (\Exception $e) {
        }
        Schema::table('users', function (Blueprint $table) {
            $table->renameColumn('hashed_password', 'password');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        try {
            Log::info('Renaming users password...');
        } catch (\Exception $e) {
        }
        Schema::table('users', function (Blueprint $table) {
            $table->renameColumn('password', 'hashed_password');
        });
    }
};
