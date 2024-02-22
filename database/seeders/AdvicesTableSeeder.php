<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class AdvicesTableSeeder extends Seeder
{
    public function run()
    {
        $seed_sample = config('app.seed_sample');
        try {
            $advices = [
                [
                    'title'         => "Conseil pour l'entretien des orchidées",
                    'creation_date' => Carbon::now(),
                    'description'   => "Pour garder vos orchidées en bonne santé,
                    assurez-vous de ne pas trop les arroser. Elles préfèrent un sol légèrement humide.
                    Évitez également l'exposition directe au soleil.",
                    'owner_id'      => 1,
                    'like_number'   => 10,
                ],
                [
                    'title'         => 'Conseils pour cultiver des tomates',
                    'creation_date' => Carbon::now(),
                    'description'   => "Les tomates poussent bien en plein soleil.
                    Assurez-vous de les arroser régulièrement et de les tuteurer pour les soutenir à
                    mesure qu'elles grandissent.",
                    'owner_id'      => 2,
                    'like_number'   => 8,
                ],
                [
                    'title'         => "Entretien des plantes d'intérieur en hiver",
                    'creation_date' => Carbon::now(),
                    'description'   => "En hiver, réduisez la fréquence d'arrosage de vos plantes
                    d'intérieur car elles ont besoin de moins d'eau. Gardez-les loin des courants d'air froids.",
                    'owner_id'      => 3,
                    'like_number'   => 6,
                ],
                [
                    'title'         => 'Conseils pour la culture des roses',
                    'creation_date' => Carbon::now(),
                    'description'   => 'Les roses aiment un sol bien drainé et une exposition ensoleillée.
                    Taillez régulièrement les roses fanées pour encourager de nouvelles fleurs.',
                    'owner_id'      => 4,
                    'like_number'   => 12,
                ],
            ];

            foreach ($advices as $advice) {
                DB::table('advices')->insert($advice);
            }
            \App\Models\Advice::factory()->count($seed_sample)->create();
            try {
                Log::info('Advices table seeded ✅');
            } catch (\Exception $e) {
                Log::error($e);
            }
        } catch (\Exception $e) {
            try {
                Log::error('Failed to seed advices table ❌', ['error' => $e->getMessage()]);
            } catch (\Exception $e) {
                Log::error($e);
            }
        }
    }
}
