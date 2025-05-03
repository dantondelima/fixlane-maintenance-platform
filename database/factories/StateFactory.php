<?php

namespace Database\Factories;

use App\Models\State;
use App\Models\Country;
use Illuminate\Database\Eloquent\Factories\Factory;

class StateFactory extends Factory
{
    protected $model = State::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->state(),
            'abbreviation' => $this->faker->stateAbbr(),
            'country_id' => Country::factory(),
        ];
    }
}
