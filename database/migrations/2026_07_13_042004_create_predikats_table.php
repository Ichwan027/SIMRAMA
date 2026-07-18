<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('predikats', function (Blueprint $table) {

            $table->id();

            $table->unsignedTinyInteger('nilai_min');

            $table->unsignedTinyInteger('nilai_max');

            $table->string('predikat',2);

            $table->string('keterangan',100);

            $table->timestamps();

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('predikats');
    }
};