<?php

namespace App\Http\Controllers;

use App\Models\Disposisi;
use App\Models\SuratKeluar;
use App\Models\SuratMasuk;
use Illuminate\Http\Request;

class DefaultController extends Controller
{
    public function dashboard()
    {
        $TotalSuratMasuk = SuratMasuk::where('tipeSurat', 'Surat Masuk')->count();
        $TotalSuratKeluar = SuratKeluar::where('tipeSurat', 'Surat Keluar')->count();
        $TotalSuratDisposisi = Disposisi::all()->count();
        return view('dashboard',[
            'TotalSuratMasuk' => $TotalSuratMasuk,
            'TotalSuratKeluar'=> $TotalSuratKeluar,
            'TotalSuratDisposisi' => $TotalSuratDisposisi
        ]);
    }

    public function suratmasuk()
    {
        $suratmasuk = SuratMasuk::all();
        return view('surat-masuk',['suratmasuk' => $suratmasuk]);
    }

    public function suratkeluar()
    {
        $suratkeluar = SuratKeluar::all();
        return view('surat-keluar', ['suratkeluar' => $suratkeluar]);
    }

    public function suratdisposisi()
    {
        $suratdisposisi = Disposisi::all();
        return view('surat-disposisi', ['suratdisposisi' => $suratdisposisi]);
    }
}
