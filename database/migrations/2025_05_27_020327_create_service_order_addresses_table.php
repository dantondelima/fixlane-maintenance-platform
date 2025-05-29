<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('service_order_addresses', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->foreignUlid('service_order_id')->constrained('service_orders');
            $table->foreignId('country_id')->constrained('countries');
            $table->foreignId('state_id')->constrained('states');
            $table->foreignId('city_id')->constrained('cities');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('service_order_addresses');
    }
};
