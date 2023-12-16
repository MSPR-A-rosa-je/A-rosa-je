<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use Illuminate\Support\Facades\Log;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Address>
 */
class AddressFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $city =   $this->faker->city;

        if (!app()->runningUnitTests() && !app()->runningInConsole()) {
            Log::info('Creating a new address: ' . $city . ' ✅');
        }
        return [
            'address' => $this->faker->streetAddress,
            'zip_code' => $this->faker->postcode,
            'user_id' => User::factory()->create()->id,
            'city' => $city,
        ];
    }
}
