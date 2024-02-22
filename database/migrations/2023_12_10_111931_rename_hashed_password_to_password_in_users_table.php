<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        try {
            Log::info('Renaming users password...');
        } catch (\Exception $e) {
            Log::error($e);
        }
        Schema::table('users', function (Blueprint $table) {
            $table->renameColumn('hashed_password', 'password');
        });
    }

    public function down()
    {
        try {
            Log::info('Renaming users password...');
        } catch (\Exception $e) {
            Log::error($e);
        }
        Schema::table('users', function (Blueprint $table) {
            $table->renameColumn('password', 'hashed_password');
        });
    }
};
