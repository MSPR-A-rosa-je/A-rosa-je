<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Log;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {
        try {
            $this->call(UsersTableSeeder::class);
            Log::info('Seeding users table...');
        } catch (\Exception $e) {
            $this->call(UsersTableSeeder::class);
        }

        try {
            $this->call(PlantsTableSeeder::class);
            Log::info('Seeding plants table...');
        } catch (\Exception $e) {
            $this->call(PlantsTableSeeder::class);
        }

        try {
            $this->call(AdvicesTableSeeder::class);
            Log::info('Seeding advices table...');
        } catch (\Exception $e) {
            $this->call(AdvicesTableSeeder::class);
        }

        try {
            $this->call(QuestionsTableSeeder::class);
            Log::info('Seeding questions table...');
        } catch (\Exception $e) {
            $this->call(QuestionsTableSeeder::class);
        }

        try {
            $this->call(AnswersTableSeeder::class);
            Log::info('Seeding answers table...');
        } catch (\Exception $e) {
            $this->call(AnswersTableSeeder::class);
        }

        try {
            $this->call(MissionsTableSeeder::class);
            Log::info('Seeding missions table...');
        } catch (\Exception $e) {
            $this->call(MissionsTableSeeder::class);
        }
    }
}
