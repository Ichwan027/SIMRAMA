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
        Schema::create('gurus', function (Blueprint $table) {

            $table->id();

            $table->string('nama',150);

            $table->string('jabatan',50);

            $table->enum('jenis_kelamin',[
                'Laki-laki',
                'Perempuan'
            ]);

            $table->string('tempat_lahir',100)->nullable();

            $table->date('tanggal_lahir')->nullable();

            $table->text('alamat')->nullable();

            $table->string('telepon',20)->nullable();

            $table->string('email',100)->nullable();

            $table->string('foto')->nullable();

            $table->boolean('status')->default(true);

            $table->timestamps();

            $table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gurus');
    }
};