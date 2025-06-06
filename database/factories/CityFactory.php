<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\City;
use App\Models\State;
use Illuminate\Database\Eloquent\Factories\Factory;

class CityFactory extends Factory
{
    protected $model = City::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->city(),
            'state_id' => State::factory(),
        ];
    }

    public function setState(string $stateId): static
    {
        return $this->state([
            'state_id' => $stateId,
        ]);
    }
}
