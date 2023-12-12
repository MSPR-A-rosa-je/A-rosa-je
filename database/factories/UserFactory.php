<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'is_botanist' => $this->faker->boolean,
            'creation_date' => now(),
            'botanist_since' => $this->faker->dateTimeBetween('-2 years', 'now'),
            'pseudo' => $this->faker->userName,
            'first_name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'phone_number' => $this->faker->phoneNumber,
            'email' => $this->faker->unique()->safeEmail,
            'birth_date' => $this->faker->dateTimeBetween('-30 years', '-18 years'),
            'url_picture' => $this->faker->imageUrl,
            'zip_code' => $this->faker->postcode,
            'city' => $this->faker->city,
            'address' => $this->faker->address,
            'password' => bcrypt('secret'),
        ];
    }
}
