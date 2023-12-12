<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Advice>
 */
class AdviceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'owner_id'  => User::factory(),
            'title' => $this->faker->word,
            'creation_date' => $this->faker->date,
            'description' => $this->faker->paragraph,
            'like_number'  => rand(1, 100),
        ];
    }
}
