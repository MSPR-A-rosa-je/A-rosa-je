<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use Illuminate\Support\Facades\Log;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Question>
 */
class QuestionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $title = $this->faker->sentence;
        if (!app()->runningUnitTests() && !app()->runningInConsole()) {
            Log::info("Creating a new question: $title ✅");
        }
        return [
            'title' => $title,
            'description' => $this->faker->paragraph,
            'creation_date' => $this->faker->date,
            'owner_id' => User::factory(),
        ];
    }
}
