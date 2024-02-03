<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $seed_sample = config('app.seed_sample');
        try {
            $users = [
                [
                    'is_botanist' => true,
                    'is_admin' => false,
                    'creation_date' => Carbon::now(),
                    'botanist_since' => Carbon::now()->subYears(2),
                    'pseudo' => 'BuddingBotanist',
                    'first_name' => 'Jasper',
                    'last_name' => 'Rosebush',
                    'phone_number' => '0787215507',
                    'email' => 'buddingbotanist@example.com',
                    'birth_date' => '1998-07-30',
                    'url_picture' => 'https://ibb.co/JFcBKW2',
                    'password' => Hash::make('password42'),
                ],
                [
                    'is_botanist' => false,
                    'is_admin' => false,
                    'creation_date' => Carbon::now(),
                    'pseudo' => 'CactusCharmer',
                    'first_name' => 'Daisy',
                    'last_name' => 'Fernwood',
                    'phone_number' => '0626711181',
                    'email' => 'cactuscharmer@example.com',
                    'birth_date' => '1985-05-16',
                    'url_picture' => 'https://ibb.co/NrMQNVm',
                    'password' => Hash::make('password17'),
                ],
                [
                    'is_botanist' => false,
                    'is_admin' => false,
                    'creation_date' => Carbon::now(),
                    'pseudo' => 'FloralFiesta',
                    'first_name' => 'Lily',
                    'last_name' => 'Greenleaf',
                    'phone_number' => '0726211107',
                    'email' => 'floralfiesta@example.com',
                    'birth_date' => '1964-08-11',
                    'url_picture' => 'https://ibb.co/ts5cY79',
                    'password' => Hash::make('password24'),
                ],
                [
                    'is_botanist' => false,
                    'is_admin' => true,
                    'creation_date' => Carbon::now(),
                    'pseudo' => 'Ptitlu',
                    'first_name' => 'Lucas' ,
                    'last_name' => 'Beyer',
                    'phone_number' => '0787215507',
                    'email' => 'lucas.beyer@gmx.fr',
                    'birth_date' => '1998-30-07',
                    'url_picture' => 'https://ibb.co/PzvZCbh',
                    'password' => Hash::make('98d8caeb4'),
                ],
                [
                    'is_botanist' => false,
                    'is_admin' => false,
                    'creation_date' => Carbon::now(),
                    'pseudo' => 'Ptitlu',
                    'first_name' => 'Lucas' ,
                    'last_name' => 'Beyer',
                    'phone_number' => '0787215507',
                    'email' => 'lucas.beyer2@gmx.fr',
                    'birth_date' => '1998-30-07',
                    'url_picture' => 'https://ibb.co/PzvZCbh',
                    'password' => Hash::make('98d8caeb4'),
                ],
            ];

            foreach ($users as $user) {
                DB::table('users')->insert($user);
            }
            \App\Models\User::factory()->count($seed_sample)->create();
            try {
                Log::info('Users table seeded ✅');
            } catch (\Exception $e) {
            }
        } catch (\Exception $e) {
            try {
                Log::error('Failed to seed users table ❌', ['error' => $e->getMessage()]);
            } catch (\Exception $e) {
            }
        }
    }
}
