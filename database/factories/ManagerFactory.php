<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Manager;
use App\States\Manager\ManagerState;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Manager>
 */
class ManagerFactory extends Factory
{
    protected $model = Manager::class;

    public function definition(): array
    {
        $status = ManagerState::all()->random();

        return [
            'user_id' => User::factory(),
            'name' => $this->faker->name(),
            'document' => $this->faker->unique()->numerify('###########'),
            'birth_date' => $this->faker->dateTimeBetween('-30 years', '-18 years'),
            'status' => $status,
        ];
    }
}
