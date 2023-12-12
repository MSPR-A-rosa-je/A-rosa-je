<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

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
        return [
            'owner_id' => rand(1, 100),
            'specie_name' => $this->faker->word,
            'location' => $this->faker->city,
            'url_photo' => $this->faker->imageUrl(),
            'status' => $this->faker->randomElement(['Healthy', 'Diseased', 'Unknown']),
            'description' => $this->faker->paragraph,
        ];
    }
}
