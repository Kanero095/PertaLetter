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
        Schema::create('surat_ditolaks', function (Blueprint $table) {
            $table->id();
            $table->string('asalSurat');
            $table->string('noSurat');
            $table->string('perihal');
            $table->string('alasan');
            $table->date('tglMasukSuratDitolak');
            $table->string('fileSuratDitolak');
            $table->string('slug')->unique();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('surat_ditolaks');
    }
};
