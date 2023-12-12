<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Answer>
 */
class AnswerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'question_id' => $this->faker->rand(1, 1000),
            'owner_id' => $this->faker->rand(1, 1000),
            'description' => $this->faker->paragraph,
            'like_number' => $this->faker->rand(1, 100),
        ];
    }
}
