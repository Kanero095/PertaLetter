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
        Schema::create('disposisis', function (Blueprint $table) {
            $table->id();
            $table->string('kota');
            $table->date('tglSuratdibuat');
            $table->string('noSuratDisposisi');
            $table->string('lampiran');
            $table->string('perihal');
            $table->string('kepada');
            $table->string('lokasiTujuan');
            $table->string('noSuratdibalas');
            $table->date('tglSuratMasuk');
            $table->string('nama');
            $table->string('jurusan');
            $table->string('pembimbing');
            $table->string('ditempatkan');
            $table->date('tglMulai');
            $table->date('tglBerakhir');
            $table->string('slug')->unique();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('disposisis');
    }
};
