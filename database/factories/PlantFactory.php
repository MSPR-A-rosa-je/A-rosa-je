<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use Illuminate\Support\Facades\Log;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Plant>
 */
class PlantFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $specieName = $this->faker->word;
        $status = $this->faker->randomElement(['Healthy', 'Diseased', 'Unknown']);

        if (!app()->runningUnitTests() && !app()->runningInConsole()) {
            Log::info("Creating a new plant: Specie - $specieName, Status - $status ✅");
        }

        return [
            'owner_id' => User::factory(),
            'specie_name' => $specieName,
            'location' => $this->faker->city,
            'url_photo' => $this->faker->imageUrl(),
            'status' => $status,
            'description' => $this->faker->paragraph,
        ];
    }
}
