<?php

declare(strict_types=1);

namespace App\Models;

use App\States\ServiceOrder\ServiceOrderState;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\ModelStates\HasStates;

class ServiceOrder extends Model
{
    use HasFactory, HasStates, HasUlids;

    protected $table = 'service_orders';

    protected $fillable = [
        'manager_user_id',
        'service_category_id',
        'contractor_user_id',
        'description',
        'status',
        'expected_start_at',
    ];

    protected $casts = [
        'id' => 'ulid',
        'manager_user_id' => 'ulid',
        'contractor_user_id' => 'ulid',
        'expected_start_at' => 'datetime',
        'status' => ServiceOrderState::class,
    ];
}
