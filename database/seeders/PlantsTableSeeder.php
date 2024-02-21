<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Constants\OtherConstants;
use App\Models\Plant;

class PlantsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $seed_sample = config('app.seed_sample');
        try {
            $plants = $this->getPlantsData();

            foreach ($plants as $plant) {
                DB::table('plants')->insert($plant);
            }

            Plant::factory()->count($seed_sample)->create();

            Log::info('Plants table seeded ✅');
        } catch (\Exception $e) {
            Log::error('Failed to seed plants table ❌', ['error' => $e->getMessage()]);
        }
    }

    /**
     * Get the plants data array.
     */
    private function getPlantsData()
    {
        $basePlant = [
            'advices_list' => json_encode([3, 4]),
            'url_photo' => OtherConstants::FAKE_PIC_URL,
        ];

        $plantsDetails = [
            [
                'owner_id' => 1,
                'specie_name' => 'Rose',
                'location' => 'Jardin',
                'status' => 'En bonne santé',
                'description' => 'Belle rose rouge épanouie.'
            ],
            [
                'owner_id' => 1,
                'specie_name' => 'Tulipe',
                'location' => 'Balcon',
                'status' => 'Besoin d\'eau',
                'description' => 'Tulipes jaunes nécessitant un arrosage régulier.'
            ],
            [
                'owner_id' => 2,
                'specie_name' => 'Chêne',
                'location' => 'Cour arrière',
                'status' => 'Robuste',
                'description' => 'Grand chêne avec une large canopée.'
            ],
            [
                'owner_id' => 2,
                'specie_name' => 'Lavande',
                'location' => 'Jardin avant',
                'status' => 'Florissante',
                'description' => 'Lavande parfumée attirant les abeilles et les papillons.'
            ],
            [
                'owner_id' => 3,
                'specie_name' => 'Cactus',
                'location' => 'Fenêtre intérieure',
                'status' => 'Nécessite peu de soins',
                'description' => 'Un cactus résistant nécessitant peu d\'arrosage.'
            ],
            [
                'owner_id' => 3,
                'specie_name' => 'Orchidée',
                'location' => 'Serre',
                'status' => 'Délicate',
                'description' => 'Orchidée exotique avec de magnifiques fleurs.'
            ],
            [
                'owner_id' => 4,
                'specie_name' => 'Bambou',
                'location' => 'Bord de l\'étang',
                'status' => 'Croissance rapide',
                'description' => 'Bambou vert poussant rapidement près de l\'eau.'
            ],
            [
                'owner_id' => 4,
                'specie_name' => 'Érable japonais',
                'location' => 'Jardin japonais',
                'status' => 'Coloré',
                'description' => 'Petit érable avec des feuilles rouges et oranges éclatantes.'
            ]
        ];
        return array_map(function ($plantDetails) use ($basePlant) {
            return array_merge($basePlant, $plantDetails);
        }, $plantsDetails);
    }
}
