<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('countries', function (Blueprint $table) {
            $table->id();
            $table->string('name', 40)->unique();
            $table->string('code', 5)->unique();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('countries');
    }
};
