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
        Schema::create('pengaturans', function (Blueprint $table) {

            $table->id();

            $table->string('nama_madrasah', 150);

            $table->text('alamat');

            $table->string('kabupaten', 100);

            $table->string('provinsi', 100);

            $table->string('kode_pos', 10)->nullable();

            $table->string('telepon', 20)->nullable();

            $table->string('email', 100)->nullable();

            $table->string('website', 150)->nullable();

            $table->string('logo')->nullable();

            $table->string('kepala_madrasah', 150);

            $table->string('nip_kepala', 50)->nullable();

            $table->string('tempat_cetak', 100);

            $table->text('footer_raport')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengaturans');
    }
};
