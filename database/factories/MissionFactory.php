<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Mission>
 */
class MissionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $userIds = User::factory()->count(10)->create()->pluck('id')->toArray();

        return [
            'creation_date' => $this->faker->date,
            'start_date' => $this->faker->date,
            'end_date' => $this->faker->date,
            'owner_id' => User::factory(),
            'botanist_id' => User::factory(),
            'candidates_list' => json_encode($userIds),
            'price' => rand(1, 100),
            'description' => $this->faker->sentence,
        ];
    }
}
