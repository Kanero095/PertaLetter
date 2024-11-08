<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Disposisi extends Model
{
    use HasFactory;

    protected $fillable =[
        'kota',
        'tglSuratDibuat',
        'noSuratDisposisi',
        'lampiran',
        'perihal',
        'kepada',
        'lokasiTujuan',
        'noSuratdibalas',
        'tglSuratMasuk',
        'nama',
        'jurusan',
        'pembimbing',
        'ditempatkan',
        'tglMulai',
        'tglBerakhir',
        'file_name',
        'file_path',
        'fileDisposisi',
        'slug'
    ];
}
