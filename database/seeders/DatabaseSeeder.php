<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Log;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        try {
            Log::info('Seeding users table...');
            $this->call(UsersTableSeeder::class);
        } catch (\Exception $e) {
            $this->call(UsersTableSeeder::class);
        }

        try {
            Log::info('Seeding missions table...');
            $this->call(MissionsTableSeeder::class);
        } catch (\Exception $e) {
            $this->call(MissionsTableSeeder::class);
        }

        try {
            Log::info('Seeding sessions table...');
            $this->call(SessionsTableSeeder::class);
        } catch (\Exception $e) {
            $this->call(SessionsTableSeeder::class);
        }

        try {
            Log::info('Seeding advices table...');
            $this->call(AdvicesTableSeeder::class);
        } catch (\Exception $e) {
            $this->call(AdvicesTableSeeder::class);
        }

        try {
            Log::info('Seeding Addresses table...');
            $this->call(AddressesTableSeeder::class);
        } catch (\Exception $e) {
            $this->call(AddressesTableSeeder::class);
        }

        try {
            Log::info('Seeding plants table...');
            $this->call(PlantsTableSeeder::class);
        } catch (\Exception $e) {
            $this->call(PlantsTableSeeder::class);
        }
    }
}
