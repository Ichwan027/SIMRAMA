<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('nilai_details', function (Blueprint $table) {

            $table->id();

            $table->foreignId('nilai_id')
                ->constrained('nilais')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();

            $table->foreignId('guru_mengajar_id')
                ->constrained('guru_mengajars')
                ->cascadeOnUpdate()
                ->restrictOnDelete();

            $table->unsignedTinyInteger('kkm');

            $table->unsignedTinyInteger('nilai_angka');

            $table->foreignId('predikat_id')
                ->constrained('predikats')
                ->cascadeOnUpdate()
                ->restrictOnDelete();

            $table->text('deskripsi')->nullable();

            $table->timestamps();

            $table->unique([
                'nilai_id',
                'guru_mengajar_id'
            ]);

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('nilai_details');
    }
};