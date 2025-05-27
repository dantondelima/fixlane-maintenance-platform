<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceOrderAddress extends Model
{
    use HasFactory;

    protected $table = 'service_order_addresses';

    protected $fillable = [
        'service_order_id',
        'country_id',
        'state_id',
        'city_id',
    ];
}
