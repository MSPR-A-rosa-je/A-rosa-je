<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class PlantsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $seed_sample = config('app.seed_sample');
        try {
            $plants = [
                [
                    'advices_list' =>  json_encode([3, 4]),
                    'owner_id' => 1,
                    'specie_name' => 'Rose',
                    'location' => 'Jardin',
                    'url_photo' => 'https://ibb.co/qrfthKs',
                    'status' => 'En bonne santé',
                    'description' => 'Belle rose rouge épanouie.'
                ],
                [
                    'advices_list' =>  json_encode([3, 4]),
                    'owner_id' => 1,
                    'specie_name' => 'Tulipe',
                    'location' => 'Balcon',
                    'url_photo' => 'https://ibb.co/qrfthKs',
                    'status' => 'Besoin d\'eau',
                    'description' => 'Tulipes jaunes nécessitant un arrosage régulier.'
                ],
                [
                    'advices_list' =>  json_encode([3, 4]),
                    'owner_id' => 2,
                    'specie_name' => 'Chêne',
                    'location' => 'Cour arrière',
                    'url_photo' => 'https://ibb.co/qrfthKs',
                    'status' => 'Robuste',
                    'description' => 'Grand chêne avec une large canopée.'
                ],
                [
                    'advices_list' =>  json_encode([3, 4]),
                    'owner_id' => 2,
                    'specie_name' => 'Lavande',
                    'location' => 'Jardin avant',
                    'url_photo' => 'https://ibb.co/qrfthKs',
                    'status' => 'Florissante',
                    'description' => 'Lavande parfumée attirant les abeilles et les papillons.'
                ],
                [
                    'advices_list' =>  json_encode([3, 4]),
                    'owner_id' => 3,
                    'specie_name' => 'Cactus',
                    'location' => 'Fenêtre intérieure',
                    'url_photo' => 'https://ibb.co/qrfthKs',
                    'status' => 'Nécessite peu de soins',
                    'description' => 'Un cactus résistant nécessitant peu d\'arrosage.'
                ],
                [
                    'advices_list' =>  json_encode([3, 4]),
                    'owner_id' => 3,
                    'specie_name' => 'Orchidée',
                    'location' => 'Serre',
                    'url_photo' => 'https://ibb.co/qrfthKs',
                    'status' => 'Délicate',
                    'description' => 'Orchidée exotique avec de magnifiques fleurs.'
                ],
                [
                    'advices_list' =>  json_encode([3, 4]),
                    'owner_id' => 4,
                    'specie_name' => 'Bambou',
                    'location' => 'Bord de l\'étang',
                    'url_photo' => 'https://ibb.co/qrfthKs',
                    'status' => 'Croissance rapide',
                    'description' => 'Bambou vert poussant rapidement près de l\'eau.'
                ],
                [
                    'advices_list' =>  json_encode([3, 4]),
                    'owner_id' => 4,
                    'specie_name' => 'Érable japonais',
                    'location' => 'Jardin japonais',
                    'url_photo' => 'https://ibb.co/qrfthKs',
                    'status' => 'Coloré',
                    'description' => 'Petit érable avec des feuilles rouges et oranges éclatantes.'
                ]

            ];

            foreach ($plants as $plant) {
                DB::table('plants')->insert($plant);
            }
            \App\Models\Plant::factory()->count($seed_sample)->create();
            try {
                Log::info('Plants table seeded ✅');
            } catch (\Exception $e) {
            }
        } catch (\Exception $e) {
            try {
                Log::error('Failed to seed plants table ❌', ['error' => $e->getMessage()]);
            } catch (\Exception $e) {
            }
        }
    }
}
