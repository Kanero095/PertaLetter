<?php

namespace App\Http\Controllers;

use App\Models\SuratMasuk;
use Illuminate\Http\Request;

class DefaultController extends Controller
{
    public function dashboard()
    {
        $TotalSuratMasuk = SuratMasuk::where('tipeSurat', 'Surat Masuk')->count();
        return view('dashboard',[
            'TotalSuratMasuk' => $TotalSuratMasuk,
        ]);
    }

    public function suratmasuk()
    {
        $suratmasuk = SuratMasuk::all();
        return view('surat-masuk',['suratmasuk' => $suratmasuk]);
    }

    public function suratkeluar()
    {
        return view('surat-keluar');
    }
}
