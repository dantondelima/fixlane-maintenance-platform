<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('states', function (Blueprint $table) {
            $table->id();
            $table->string('name', 50);
            $table->string('code', 5);
            $table->foreignId('country_id')->constrained('countries');

            $table->unique(['code', 'country_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('states');
    }
};
