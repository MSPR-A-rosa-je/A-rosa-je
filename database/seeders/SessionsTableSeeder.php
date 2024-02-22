<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class SessionsTableSeeder extends Seeder
{
    public function run()
    {
        $seed_sample = config('app.seed_sample');
        try {
            $sessions = [
                [
                    'creation_date' => now(),
                    'plant_list'    => json_encode([1, 2]),
                    'owner_id'      => 1,
                    'mission_id'    => 1,
                    'note'          => 'Note pour session 1',
                ],
                [
                    'creation_date' => now(),
                    'plant_list'    => json_encode([3, 4]),
                    'owner_id'      => 2,
                    'mission_id'    => 2,
                    'note'          => 'Note pour session 2',
                ],
                [
                    'creation_date' => now(),
                    'plant_list'    => json_encode([5, 6]),
                    'owner_id'      => 3,
                    'mission_id'    => 3,
                    'note'          => 'Note pour session 3',
                ],
                [
                    'creation_date' => now(),
                    'plant_list'    => json_encode([7, 8]),
                    'owner_id'      => 4,
                    'mission_id'    => 4,
                    'note'          => 'Note pour session 4',
                ]
            ];

            foreach ($sessions as $session) {
                DB::table('sessions')->insert($session);
            }
            \App\Models\Session::factory()->count($seed_sample / 2)->create();
            try {
                Log::info('Sessions table seeded ✅');
            } catch (\Exception $e) {
                Log::error('$e');
            }
        } catch (\Exception $e) {
            try {
                Log::error('Failed to seed sessions table ❌', ['error' => $e->getMessage()]);
            } catch (\Exception $e) {
                Log::error('$e');
            }
        }
    }
}
