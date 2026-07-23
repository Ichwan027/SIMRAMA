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
        Schema::create('nilai_tilawatis', function (Blueprint $table) {

            $table->id();

            $table->foreignId('nilai_id')
                ->constrained('nilais')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();

            $table->foreignId('tilawati_id')
                ->constrained('tilawatis')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();

            $table->unsignedTinyInteger('nilai');

            $table->foreignId('predikat_id')
                ->nullable()
                ->constrained('predikats')
                ->cascadeOnUpdate()
                ->nullOnDelete();

            $table->timestamps();

            $table->softDeletes();

            $table->unique([
                'nilai_id',
                'tilawati_id'
            ]);

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nilai_tilawatis');
    }
};