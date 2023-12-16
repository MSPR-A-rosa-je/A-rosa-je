<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Question;
use App\Models\User;
use Illuminate\Support\Facades\Log;

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
        $description = $this->faker->sentence;
        if (!app()->runningUnitTests() && !app()->runningInConsole()) {
            Log::info("Creating a new answer: $description ✅");
        }
        return [
            'question_id' => Question::factory(),
            'owner_id' => User::factory(),
            'description' => $description,
            'like_number' => rand(1, 100),
        ];
    }
}
