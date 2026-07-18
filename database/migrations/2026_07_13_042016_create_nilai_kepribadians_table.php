<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('nilai_kepribadians', function (Blueprint $table) {

            $table->id();

            $table->foreignId('santri_id')
                ->constrained('santris')
                ->cascadeOnUpdate()
                ->restrictOnDelete();

            $table->foreignId('kepribadian_id')
                ->constrained('kepribadians')
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

            // GANTI INI
            $table->string('nilai', 2);

            $table->text('catatan')->nullable();

            $table->timestamps();

            $table->unique([
                'santri_id',
                'kepribadian_id',
                'tahun_ajaran_id',
                'semester_id'
            ], 'uq_nilai_kepribadian');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('nilai_kepribadians');
    }
};
