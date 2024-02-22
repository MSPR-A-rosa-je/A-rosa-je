<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        try {
            Log::info('Renaming users mail to email.');
        } catch (\Exception $e) {
            Log::error($e);
        }
        Schema::table('users', function (Blueprint $table) {
            $table->renameColumn('mail', 'email');
        });
    }

    public function down()
    {
        try {
            Log::info('Renaming users email to mail...');
        } catch (\Exception $e) {
            Log::error($e);
        }
        Schema::table('users', function (Blueprint $table) {
            $table->renameColumn('email', 'mail');
        });
    }
};
