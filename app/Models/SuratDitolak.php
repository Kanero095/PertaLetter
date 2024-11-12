<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratDitolak extends Model
{
    use HasFactory;

    protected $fillable = [
        'asalSurat',
        'noSurat',
        'perihal',
        'alasan',
        'tglMasukSuratDitolak',
        'fileSuratDitolak',
        'slug',
    ];
}
