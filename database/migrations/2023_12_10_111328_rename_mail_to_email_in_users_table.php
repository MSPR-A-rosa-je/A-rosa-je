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
            Log::info('Renaming users mail to email.');
        } catch (\Exception $e) {
        }
        Schema::table('users', function (Blueprint $table) {
            $table->renameColumn('mail', 'email');
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
            Log::info('Renaming users email to mail...');
        } catch (\Exception $e) {
        }
        Schema::table('users', function (Blueprint $table) {
            $table->renameColumn('email', 'mail');
        });
    }
};
