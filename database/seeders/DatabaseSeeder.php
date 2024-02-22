<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Log;

class DatabaseSeeder extends Seeder
{
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
            $this->call(MissionsTableSeeder::class);
            Log::info('Seeding missions table...');
        } catch (\Exception $e) {
            $this->call(MissionsTableSeeder::class);
        }

        try {
            $this->call(SessionsTableSeeder::class);
            Log::info('Seeding sessions table...');
        } catch (\Exception $e) {
            $this->call(SessionsTableSeeder::class);
        }

        try {
            $this->call(AddressesTableSeeder::class);
            Log::info('Seeding Addresses table...');
        } catch (\Exception $e) {
            $this->call(AddressesTableSeeder::class);
        }
    }
}
