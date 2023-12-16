<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Log;

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
        $title = $this->faker->sentence;
        if (!app()->runningUnitTests() && !app()->runningInConsole()) {
            Log::info('Creating a new advice: ' . $title . ' ✅');
        }
        return [
            'owner_id'  => User::factory(),
            'title' => $title,
            'creation_date' => $this->faker->date,
            'description' => $this->faker->paragraph,
            'like_number'  => rand(1, 100),
        ];
    }
}
