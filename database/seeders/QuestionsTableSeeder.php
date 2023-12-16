<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class QuestionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        try {
            $questions = [
                [
                    'title' => 'Comment entretenir un cactus ?',
                    'description' => 'J\'ai récemment acheté un cactus et je ne sais pas comment en prendre soin. Des conseils ?',
                    'creation_date' => Carbon::now(),
                    'owner_id' => 1,
                ],
                [
                    'title' => 'Quelle est la meilleure période pour tailler les arbres fruitiers ?',
                    'description' => 'Je possède quelques arbres fruitiers dans mon jardin et je me demande quand est le meilleur moment pour les tailler.',
                    'creation_date' => Carbon::now(),
                    'owner_id' => 2,
                ],
                [
                    'title' => 'Besoin de conseils pour mon jardin potager',
                    'description' => 'Je suis novice en jardinage et je viens de créer un jardin potager. Des conseils pour bien commencer ?',
                    'creation_date' => Carbon::now(),
                    'owner_id' => 3,
                ],
                [
                    'title' => 'Comment lutter naturellement contre les pucerons ?',
                    'description' => 'Mon jardin est envahi par les pucerons, et je préfère utiliser des méthodes naturelles pour m\'en débarrasser. Des idées ?',
                    'creation_date' => Carbon::now(),
                    'owner_id' => 4,
                ],
            ];

            foreach ($questions as $question) {
                DB::table('questions')->insert($question);
            }
            \App\Models\Question::factory()->count(10)->create(function (array $attributes) {
                return [
                    'owner_id' => rand(1, 10),
                ];
            });
            try {
                Log::info('Questions table seeded ✅');
            } catch (\Exception $e) {
            }
        } catch (\Exception $e) {
            try {
                Log::error('Failed to seed questions table ❌', ['error' => $e->getMessage()]);
            } catch (\Exception $e) {
            }
        }
    }
}
