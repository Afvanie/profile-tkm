<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('accreditations', function (Blueprint $table) {
            $table->id();

            $table->string('title');
            $table->string('type')->default('nasional');
            $table->string('institution')->nullable();
            $table->string('rank')->nullable();
            $table->string('certificate_number')->nullable();

            $table->date('valid_from')->nullable();
            $table->date('valid_until')->nullable();

            $table->string('file_path')->nullable();
            $table->text('description')->nullable();

            $table->boolean('is_active')->default(true);
            $table->integer('sort_order')->default(0);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('accreditations');
    }
};