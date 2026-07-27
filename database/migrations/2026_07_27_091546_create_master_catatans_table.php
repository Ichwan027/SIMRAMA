<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('master_catatans', function (Blueprint $table) {

            $table->id();

            $table->integer('nilai_min');

            $table->integer('nilai_max');

            $table->text('catatan');

            $table->integer('urutan')->default(1);

            $table->boolean('aktif')->default(true);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('master_catatans');
    }
};