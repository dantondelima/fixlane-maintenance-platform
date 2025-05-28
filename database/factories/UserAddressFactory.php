<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\City;
use App\Models\User;
use App\Models\State;
use App\Models\Country;
use App\Models\UserAddress;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserAddressFactory extends Factory
{
    protected $model = UserAddress::class;

    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'country_id' => $country = Country::factory()->create()->id,
            'state_id' => $state = State::factory()->create(['country_id' => $country])->id,
            'city_id' => City::factory()->create(['state_id' => $state])->id,
            'street' => $this->faker->streetAddress,
            'number' => $this->faker->buildingNumber,
            'complement' => $this->faker->secondaryAddress,
            'neighborhood' => $this->faker->word,
            'postal_code' => $this->faker->postcode,
        ];
    }

    public function user(string $userId): static
    {
        return $this->state(fn () => [
            'user_id' => $userId,
        ]);
    }
}
