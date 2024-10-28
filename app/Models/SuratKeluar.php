<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratKeluar extends Model
{
    use HasFactory;

    protected $fillable = [
        'tujuanSuratKeluar',
        'noSurat',
        'tipeSurat',
        'perihal',
        'slug',
        'isiRingkas',
        'tglSuratKeluar',
        'fileSuratKeluar',
    ];
}
