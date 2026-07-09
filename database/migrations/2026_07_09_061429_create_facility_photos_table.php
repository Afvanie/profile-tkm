<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('facility_photos', function (Blueprint $table) {
            $table->id();

            $table->foreignId('facility_id')
                ->constrained('facilities')
                ->cascadeOnDelete();

            $table->string('title')->nullable();
            $table->string('photo');
            $table->unsignedInteger('sort_order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('facility_photos');
    }
};