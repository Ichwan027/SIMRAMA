<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('absensis', function (Blueprint $table) {

            $table->id();

            $table->foreignId('santri_id')
                ->constrained('santris')
                ->cascadeOnUpdate()
                ->restrictOnDelete();

            $table->foreignId('tahun_ajaran_id')
                ->constrained('tahun_ajarans')
                ->cascadeOnUpdate()
                ->restrictOnDelete();

            $table->foreignId('semester_id')
                ->constrained('semesters')
                ->cascadeOnUpdate()
                ->restrictOnDelete();

            $table->unsignedSmallInteger('sakit')->default(0);

            $table->unsignedSmallInteger('izin')->default(0);

            $table->unsignedSmallInteger('alpha')->default(0);

            $table->timestamps();

            $table->unique([
                'santri_id',
                'tahun_ajaran_id',
                'semester_id'
            ]);

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('absensis');
    }
};