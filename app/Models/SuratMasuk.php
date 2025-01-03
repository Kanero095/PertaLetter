<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratMasuk extends Model
{
    use HasFactory;

    protected $fillable = [
        'asalSuratMasuk',
        'noSurat',
        'tipeSurat',
        'perihal',
        'slug',
        'isiRingkas',
        'tglSuratMasuk',
        'fileSuratMasuk',
    ];
}
