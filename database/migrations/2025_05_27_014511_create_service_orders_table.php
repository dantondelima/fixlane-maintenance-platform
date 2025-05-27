<?php

use App\States\ServiceOrder\Pending;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('service_orders', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->foreignUlid('manager_user_id')->constrained('users');
            $table->foreignId('service_category_id')->constrained('service_categories');
            $table->foreignUlid('contractor_user_id')->constrained('users')->nullable();
            $table->text('description');
            $table->status('status')->default(Pending::$name)->index();
            $table->dateTime('expected_start_at');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('service_orders');
    }
};
