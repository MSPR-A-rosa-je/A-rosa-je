<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $users = [
            [
                'is_botanist' => true,
                'creation_date' => Carbon::now(),
                'botanist_since' => Carbon::now()->subYears(2),
                'pseudo' => 'BuddingBotanist',
                'first_name' => 'Jasper',
                'last_name' => 'Rosebush',
                'phone_number' => '0787215507',
                'mail' => 'buddingbotanist@example.com',
                'birth_date' => '1998-07-30',
                'url_picture' => 'https://ibb.co/JFcBKW2',
                'zip_code' => '42545',
                'city' => 'Greenhaven',
                'address' => '100 Sunnybrook Lane',
                'hashed_password' => Hash::make('password42'),
            ],
            [
                'is_botanist' => false,
                'creation_date' => Carbon::now(),
                'pseudo' => 'CactusCharmer',
                'first_name' => 'Daisy',
                'last_name' => 'Fernwood',
                'phone_number' => '0626711181',
                'mail' => 'cactuscharmer@example.com',
                'birth_date' => '1985-05-16',
                'url_picture' => 'https://ibb.co/NrMQNVm',
                'zip_code' => '67890',
                'city' => 'Flowerfield',
                'address' => '55 Blossom Hill Road',
                'hashed_password' => Hash::make('password17'),
            ],
            [
                'is_botanist' => false,
                'creation_date' => Carbon::now(),
                'pseudo' => 'FloralFiesta',
                'first_name' => 'Lily',
                'last_name' => 'Greenleaf',
                'phone_number' => '0726211107',
                'mail' => 'floralfiesta@example.com',
                'birth_date' => '1964-08-11',
                'url_picture' => 'https://ibb.co/ts5cY79',
                'zip_code' => '13579',
                'city' => 'LeafyVale',
                'address' => '22 Ivy Crescent',
                'hashed_password' => Hash::make('password24'),
            ],
            [
                'is_botanist' => false,
                'creation_date' => Carbon::now(),
                'pseudo' => 'PlantWhisperer',
                'first_name' => 'Oliver',
                'last_name' => 'Bloomfield',
                'phone_number' => '0687715581',
                'mail' => 'plantwhisperer@example.com',
                'birth_date' => '2002-11-04',
                'url_picture' => 'https://ibb.co/PzvZCbh',
                'zip_code' => '24680',
                'city' => 'Woodland City',
                'address' => '88 Orchard Avenue',
                'hashed_password' => Hash::make('password88'),
            ],
        ];

        foreach ($users as $user) {
            DB::table('users')->insert($user);
        }
    }
}
