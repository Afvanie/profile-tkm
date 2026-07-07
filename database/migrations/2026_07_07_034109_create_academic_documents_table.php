<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('academic_documents', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->enum('category', [
                'pedoman_akademik',
                'kalender_akademik',
                'kurikulum',
                'jadwal_kuliah',
                'laporan_ketercapaian'
            ]);
            $table->text('description')->nullable();
            $table->string('file_path')->nullable();
            $table->string('external_link')->nullable();
            $table->string('academic_year')->nullable();
            $table->boolean('is_active')->default(true);
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('academic_documents');
    }
};