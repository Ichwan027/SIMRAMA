<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('nilai_tahfidzs', function (Blueprint $table) {

            $table->id();

            $table->foreignId('santri_id')
                ->constrained('santris')
                ->cascadeOnUpdate()
                ->restrictOnDelete();

            $table->foreignId('tahfidz_id')
                ->constrained('tahfidzs')
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

            $table->string('nilai', 20);

            $table->timestamps();

            $table->unique(
                [
                    'santri_id',
                    'tahfidz_id',
                    'tahun_ajaran_id',
                    'semester_id'
                ],
                'uq_nilai_tahfidz'
            );
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nilai_tahfidzs');
    }
};
