<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class AnswersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Réponses fictives
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

        // Insérer les réponses dans la table
        foreach ($answers as $answer) {
            DB::table('answers')->insert($answer);
        }
    }
}
