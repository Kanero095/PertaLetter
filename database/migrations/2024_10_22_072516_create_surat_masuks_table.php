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
        Schema::create('surat_masuks', function (Blueprint $table) {
            $table->id();
            $table->string('asalSuratMasuk');
            $table->string('noSurat');
            $table->string('tipeSurat')->default('Surat Masuk');
            $table->string('perihal');
            $table->string('isiRingkas');
            $table->date('tglSuratMasuk');
            $table->string('fileSuratMasuk');
            $table->string('slug')->unique();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('surat_masuks');
    }
};
