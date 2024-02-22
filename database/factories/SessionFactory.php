<?php

namespace Database\Factories;

use App\Models\Mission;
use App\Models\Session;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class SessionFactory extends Factory
{
    protected $model = Session::class;

    public function definition()
    {
        return [
            'creation_date' => $this->faker->dateTime(),
            'plant_list'    => json_encode($this->faker->words(5)),
            'owner_id'      => User::factory(),
            'mission_id'    => Mission::factory(),
            'note'          => $this->faker->sentence
        ];
    }
}
