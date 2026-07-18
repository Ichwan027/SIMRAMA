<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('guru_mengajars', function (Blueprint $table) {

            $table->id();

            // Guru
            $table->foreignId('guru_id')
                ->constrained('gurus')
                ->cascadeOnUpdate()
                ->restrictOnDelete();

            // Kelas
            $table->foreignId('kelas_id')
                ->constrained('kelas')
                ->cascadeOnUpdate()
                ->restrictOnDelete();

            // Mata Pelajaran
            $table->foreignId('mapel_id')
                ->constrained('mapels')
                ->cascadeOnUpdate()
                ->restrictOnDelete();

            // Tahun Ajaran
            $table->foreignId('tahun_ajaran_id')
                ->constrained('tahun_ajarans')
                ->cascadeOnUpdate()
                ->restrictOnDelete();

            // Semester
            $table->foreignId('semester_id')
                ->constrained('semesters')
                ->cascadeOnUpdate()
                ->restrictOnDelete();

            $table->timestamps();

            $table->unique(
                [
                    'guru_id',
                    'kelas_id',
                    'mapel_id',
                    'tahun_ajaran_id',
                    'semester_id'
                ],
                'gm_unique'
            );
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('guru_mengajars');
    }
};
