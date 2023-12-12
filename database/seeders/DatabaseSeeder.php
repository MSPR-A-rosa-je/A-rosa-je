<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {
        $this->call([
            UsersTableSeeder::class,
            PlantsTableSeeder::class,
            AdvicesTableSeeder::class,
            QuestionsTableSeeder::class,
            AnswersTableSeeder::class,
            MissionsTableSeeder::class,
        ]);
    }
}
