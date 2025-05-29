<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\City;
use App\Models\Country;
use App\Models\ServiceOrder;
use App\Models\ServiceOrderAddress;
use App\Models\State;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ServiceOrderAddress>
 */
class ServiceOrderAddressFactory extends Factory
{
    protected $model = ServiceOrderAddress::class;

    public function definition(): array
    {
        return [
            'service_order_id' => ServiceOrder::factory(),
            'country_id' => $country = Country::factory()->create()->id,
            'state_id' => $state = State::factory()->create(['country_id' => $country])->id,
            'city_id' => City::factory()->create(['state_id' => $state])->id,
        ];
    }
}
