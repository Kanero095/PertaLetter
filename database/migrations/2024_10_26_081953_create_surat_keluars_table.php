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
        Schema::create('surat_keluars', function (Blueprint $table) {
            $table->id();
            $table->string('tujuanSuratKeluar');
            $table->string('noSurat');
            $table->string('tipeSurat')->default('Surat Keluar');
            $table->string('perihal');
            $table->string('isiRingkas');
            $table->date('tglSuratKeluar');
            $table->string('fileSuratKeluar');
            $table->string('slug')->unique();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('surat_keluars');
    }
};
