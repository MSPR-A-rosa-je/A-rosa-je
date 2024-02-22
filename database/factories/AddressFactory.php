<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Log;

class AddressFactory extends Factory
{
    public function definition()
    {
        $city = $this->faker->city;

        if (!app()->runningUnitTests() && !app()->runningInConsole()) {
            Log::info('Creating a new address: ' . $city . ' ✅');
        }

        return [
            'address'  => $this->faker->streetAddress,
            'zip_code' => $this->faker->postcode,
            'user_id'  => User::factory()->create()->id,
            'city'     => $city,
        ];
    }
}
