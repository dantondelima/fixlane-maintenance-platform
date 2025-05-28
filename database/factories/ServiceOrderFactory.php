<?php

namespace Database\Factories;

use App\Models\ServiceCategory;
use App\Models\User;
use App\Models\ServiceOrder;
use App\States\ServiceOrder\ServiceOrderState;
use Illuminate\Database\Eloquent\Factories\Factory;

class ServiceOrderFactory extends Factory
{
    protected $model = ServiceOrder::class;

    public function definition(): array
    {
        $status = ServiceOrderState::all()->random();

        return [
            'user_id' => User::factory(),
            'service_category_id' => ServiceCategory::factory(),
            'manager_user_id' => User::factory(),
            'contractor_user_id' => User::factory(),
            'description' => $this->faker->paragraph,
            'expected_start_at' => $this->faker->dateTimeBetween('now', '+1 month'),
            'status' => $status,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
