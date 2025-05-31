<?php

namespace App\Dtos\Contractor;

use Spatie\LaravelData\Data;

class UserAddressDto extends Data {
    public function __construct(
        public string $user_id,
        public int $country_id,
        public string $city_id,
        public string $state_id,
        public string $street,
        public string $number,
        public ?string $complement = null,
        public string $neighborhood,
        public string $postal_code,
    ) {}

    public static function rules($context)
    {
        return [
            'user_id' => 'required|ulid|exists:users,id',
            'country_id' => 'required|integer|exists:countries,id',
            'state_id' => 'required|string|max:2|exists:states,id',
            'city_id' => 'required|string|max:255|exists:cities,id',
            'street' => 'required|string|max:255',
            'number' => 'required|string|max:20',
            'complement' => 'nullable|string|max:255',
            'neighborhood' => 'required|string|max:255',
            'postal_code' => 'required|string|max:10',
        ];
    }
}