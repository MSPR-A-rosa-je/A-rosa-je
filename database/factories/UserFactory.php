<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Log;

class UserFactory extends Factory
{
    public function definition()
    {
        $pseudo = $this->faker->userName;
        $email  = $this->faker->unique()->safeEmail;

        if (!app()->runningUnitTests() && !app()->runningInConsole()) {
            Log::info("Creating a new user: Pseudo - $pseudo, Email - $email ✅");
        }

        return [
            'is_botanist'    => $this->faker->boolean,
            'is_admin'       => $this->faker->boolean,
            'creation_date'  => now(),
            'botanist_since' => $this->faker->dateTimeBetween('-2 years', 'now'),
            'pseudo'         => $pseudo,
            'first_name'     => $this->faker->firstName,
            'last_name'      => $this->faker->lastName,
            'phone_number'   => $this->faker->phoneNumber,
            'email'          => $email,
            'birth_date'     => $this->faker->dateTimeBetween('-30 years', '-18 years'),
            'url_picture'    => $this->faker->imageUrl,
            'password'       => bcrypt('secret'),
        ];
    }
}
