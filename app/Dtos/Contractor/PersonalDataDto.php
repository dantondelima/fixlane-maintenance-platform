<?php

namespace App\Dtos\Contractor;

use Spatie\LaravelData\Data;

class PersonalDataDto extends Data {
    public function __construct(
        public string $user_id,
        public string $name,
        public string $document,
        public string $birth_date,
    ) {}

    public static function rules($context)
    {
        return [
            'user_id' => 'required|ulid|exists:users,id',
            'name' => 'required|string|max:255',
            'document' => 'required|string|max:20|unique:contractors,document,' . $context->user()->id,
            'birth_date' => 'required|date_format:Y-m-d',
        ];
    }
}