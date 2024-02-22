<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class AddressesTableSeeder extends Seeder
{
    public function run()
    {
        $seed_sample = config('app.seed_sample');
        try {
            $addresses = [
                [
                    'address'  => '123 Main St',
                    'city'     => 'Anytown',
                    'zip_code' => '12345',
                    'user_id'  => 1,
                ],
                [
                    'address'  => '456 Oak St',
                    'city'     => 'Sometown',
                    'zip_code' => '67890',
                    'user_id'  => 2,
                ],
                [
                    'address'  => '789 Pine St',
                    'city'     => 'Yourtown',
                    'zip_code' => '13579',
                    'user_id'  => 3,
                ],
                [
                    'address'  => '101 Maple Ave',
                    'city'     => 'TheirTown',
                    'zip_code' => '24680',
                    'user_id'  => 4,
                ]
            ];
            foreach ($addresses as $address) {
                DB::table('addresses')->insert($address);
            }
            \App\Models\Address::factory()->count($seed_sample)->create();
            try {
                Log::info('Addresses table seeded ✅');
            } catch (\Exception $e) {
                Log::error($e);
            }
        } catch (\Exception $e) {
            try {
                Log::error('Failed to seed addresses table ❌', ['error' => $e->getMessage()]);
            } catch (\Exception $e) {
                Log::error($e);
            }
        }
    }
}
