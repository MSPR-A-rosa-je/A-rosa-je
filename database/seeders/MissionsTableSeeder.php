<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;


class MissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        try {
            $missions = [
                [
                    'number_of_sessions' => 2,
                    'plants_list' => json_encode([1, 2]),
                    'creation_date' => Carbon::now()->subDays(10),
                    'start_date' => Carbon::now()->subDays(9),
                    'end_date' => Carbon::now()->subDays(1),
                    'owner_id' => 1,
                    'gardien_id' => 2,
                    'candidates_list' => json_encode([3, 4]),
                    'price' => 50.00,
                    'description' => 'Arroser le jardin.'
                ],
                [
                    'number_of_sessions' => 4,
                    'plants_list' => json_encode([3, 4]),
                    'creation_date' => Carbon::now()->subDays(5),
                    'start_date' => Carbon::now()->subDays(4),
                    'end_date' => Carbon::now()->addDays(3),
                    'owner_id' => 2,
                    'gardien_id' => 3,
                    'candidates_list' => json_encode([1, 4]),
                    'price' => 65.00,
                    'description' => 'Tailler le chêne.'
                ],
            ];

            foreach ($missions as $mission) {
                DB::table('missions')->insert($mission);
            }
            \App\Models\Mission::factory()->count(10)->create(function (array $attributes) {
                return [
                    'owner_id' => rand(1, 10),
                    'gardien_id' => rand(1, 10)
                ];
            });
            try {
                Log::info('Missions table seeded ✅');
            } catch (\Exception $e) {
            }
        } catch (\Exception $e) {
            try {
                Log::error('Failed to seed missions table ❌', ['error' => $e->getMessage()]);
            } catch (\Exception $e) {
            }
        }
    }
}
