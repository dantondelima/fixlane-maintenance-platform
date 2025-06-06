<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('user_reviews', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->foreignUlid('reviewed_user_id')->constrained('users');
            $table->foreignUlid('reviewer_user_id')->constrained('users');
            $table->foreignUlid('service_order_id')->constrained('service_orders');
            $table->text('description');
            $table->unsignedTinyInteger('rating');
            $table->boolean('is_done')->default(false)->index();
            $table->boolean('is_visible')->default(true);
            $table->timestamps();

            $table->unique(['reviewed_user_id', 'reviewer_user_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('user_reviews');
    }
};
