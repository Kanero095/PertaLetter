<?php

namespace App\Http\Controllers;

use App\Models\Disposisi;
use App\Models\SuratDitolak;
use App\Models\SuratKeluar;
use App\Models\SuratMasuk;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class DefaultController extends Controller
{
    public function dashboard()
    {
        $currentYear = Carbon::now()->year;

        $suratMasukData = SuratMasuk::selectRaw('MONTH(tglSuratMasuk) as month, COUNT(*) as count')
            ->whereYear('tglSuratMasuk', $currentYear)
            ->groupBy('month')
            ->pluck('count', 'month')
            ->toArray();

        $suratMasukPerBulan = array_fill(1, 12, 0);
        foreach ($suratMasukData as $month => $count) {
            $suratMasukPerBulan[$month] = $count;
        }

        $suratKeluarData = SuratKeluar::selectRaw('MONTH(tglSuratKeluar) as month, COUNT(*) as count')
            ->whereYear('tglSuratKeluar', $currentYear)
            ->groupBy('month')
            ->pluck('count', 'month')
            ->toArray();

        $suratKeluarPerBulan = array_fill(1, 12, 0);
        foreach ($suratKeluarData as $month => $count) {
            $suratKeluarPerBulan[$month] = $count;
        }

        $disposisiData = Disposisi::selectRaw('MONTH(tglSuratDibuat) as month, COUNT(*) as count')
            ->whereYear('tglSuratDibuat', $currentYear)
            ->groupBy('month')
            ->pluck('count', 'month')
            ->toArray();

        $suratDisposisiPerBulan = array_fill(1, 12, 0);
        foreach ($disposisiData as $month => $count) {
            $suratDisposisiPerBulan[$month] = $count;
        }

        $suratDitolakData = SuratDitolak::selectRaw('MONTH(tglMasukSuratDitolak) as month, COUNT(*) as count')
            ->whereYear('tglMasukSuratDitolak', $currentYear)
            ->groupBy('month')
            ->pluck('count', 'month')
            ->toArray();

        $suratDitolakPerBulan = array_fill(1, 12, 0);
        foreach ($suratDitolakData as $month => $count) {
            $suratDitolakPerBulan[$month] = $count;
        }

        $TotalSuratMasuk = SuratMasuk::all()->count();
        $TotalSuratKeluar = SuratKeluar::all()->count();
        $TotalSuratDisposisi = Disposisi::all()->count();
        $TotalSuratDitolak = SuratDitolak::all()->count();
        return view('dashboard', [
            'TotalSuratMasuk' => $TotalSuratMasuk,
            'TotalSuratKeluar' => $TotalSuratKeluar,
            'TotalSuratDisposisi' => $TotalSuratDisposisi,
            'TotalSuratDitolak' => $TotalSuratDitolak,
            'suratMasukPerBulan' => $suratMasukPerBulan,
            'suratKeluarPerBulan' => $suratKeluarPerBulan,
            'disposisiPerBulan' => $suratDisposisiPerBulan,
            'suratDitolakPerBulan' => $suratDitolakPerBulan,
            'tahun' => $currentYear,
        ]);
    }

    public function suratmasuk()
    {
        $suratmasuk = SuratMasuk::all();
        return view('surat-masuk', ['suratmasuk' => $suratmasuk]);
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

    public function suratditolak()
    {
        $suratditolak = SuratDitolak::all();
        return view('surat-ditolak', ['suratditolak' => $suratditolak]);
    }
}
