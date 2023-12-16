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
        $this->call([
            Log::info('Seeding users table...'),
            UsersTableSeeder::class,
            Log::info('Seeding plants table...'),
            PlantsTableSeeder::class,
            Log::info('Seeding advices table...'),
            AdvicesTableSeeder::class,
            Log::info('Seeding questions table...'),
            QuestionsTableSeeder::class,
            Log::info('Seeding answers table...'),
            AnswersTableSeeder::class,
            Log::info('Seeding missions table...'),
            MissionsTableSeeder::class,
        ]);
    }
}
