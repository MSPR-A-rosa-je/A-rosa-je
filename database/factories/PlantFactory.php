<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Log;

class PlantFactory extends Factory
{
    public function definition()
    {
        $specieName = $this->faker->word;
        $status     = $this->faker->randomElement(['Healthy', 'Diseased', 'Unknown']);

        if (!app()->runningUnitTests() && !app()->runningInConsole()) {
            Log::info("Creating a new plant: Specie - $specieName, Status - $status ✅");
        }

        return [
            'owner_id'     => User::factory(),
            'specie_name'  => $specieName,
            'location'     => $this->faker->city,
            'url_photo'    => $this->faker->imageUrl(),
            'status'       => $status,
            'description'  => $this->faker->paragraph,
            'advices_list' => rand(1, 10),
        ];
    }
}
