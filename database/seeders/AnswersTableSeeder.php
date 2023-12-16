<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class AnswersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        try {
            $answers = [
                [
                    'created_at' => Carbon::now(),
                    'like_number' => 12,
                    'question_id' => 1,
                    'description' => 'C\'est une question intéressante !',
                    'owner_id' => 1,
                ],
                [
                    'created_at' => Carbon::now(),
                    'like_number' => 5,
                    'question_id' => 1,
                    'description' => 'J\'ai la même question. Merci pour la réponse !',
                    'owner_id' => 2,
                ],
                [
                    'created_at' => Carbon::now(),
                    'like_number' => 8,
                    'question_id' => 2,
                    'description' => 'Voici une réponse détaillée à votre question.',
                    'owner_id' => 3,
                ],
            ];

            foreach ($answers as $answer) {
                DB::table('answers')->insert($answer);
            }
            \App\Models\Answer::factory()->count(10)->create(function (array $attributes) {
                return [
                    'owner_id' => rand(1, 10),
                    'question_id' => rand(1, 10),
                    Log::info('Answers table seeded ✅')
                ];
            });
        } catch (\Exception $e) {
            Log::error('Failed to seed answers table ❌', ['error' => $e->getMessage()]);
        }
    }
}
