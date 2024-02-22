<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        try {
            Log::info('Update users table...');
            Schema::table('users', function (Blueprint $table) {
                $table->unsignedBigInteger('address_id')->nullable();
                $table->foreign('address_id')->references('id')->on('addresses')->onDelete('cascade');
                $table->dropColumn(['zip_code', 'city', 'address']);
            });
        } catch (\Exception $e) {
            Log::error($e->getMessage());
        }
    }

    public function down(): void
    {
        try {
            Log::info('Reverting users table update...');
            Schema::table('users', function (Blueprint $table) {
                $table->dropForeign(['address_id']);
                $table->dropColumn('address_id');
                $table->integer('zip_code')->after('email');
                $table->text('city')->after('zip_code');
                $table->text('address')->after('city');
            });
        } catch (\Exception $e) {
            Log::error($e->getMessage());
        }
    }
};
