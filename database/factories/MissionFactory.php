<?php

namespace Database\Factories;

use App\Models\Plant;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Log;

class MissionFactory extends Factory
{
    public function definition()
    {
        $description = $this->faker->sentence;
        $price       = rand(1, 100);
        if (!app()->runningUnitTests() && !app()->runningInConsole()) {
            Log::info("Creating a new mission: $description price: $price ✅");
        }
        $userIds  = User::factory()->count(10)->create()->pluck('id')->toArray();
        $plantIds = Plant::factory()->count(10)->create()->pluck('id')->toArray();

        return [
            'number_of_sessions' => rand(1, 10),
            'plants_list'        => json_encode($plantIds),
            'creation_date'      => $this->faker->date,
            'start_date'         => $this->faker->date,
            'end_date'           => $this->faker->date,
            'owner_id'           => User::factory(),
            'gardien_id'         => User::factory(),
            'candidates_list'    => json_encode($userIds),
            'price'              => $price,
            'description'        => $description,
        ];
    }
}
