<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('nilais', function (Blueprint $table) {

            $table->text('catatan')->nullable()->after('nomor_raport');
        });
    }

    public function down(): void
    {
        Schema::table('nilais', function (Blueprint $table) {

            $table->dropColumn('catatan');
        });
    }
};
