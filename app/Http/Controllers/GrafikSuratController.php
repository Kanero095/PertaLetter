<?php

namespace App\Http\Controllers;

use App\Models\Disposisi;
use App\Models\SuratDitolak;
use App\Models\SuratKeluar;
use App\Models\SuratMasuk;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class GrafikSuratController extends Controller
{
    public function dashboard()
{
    $currentYear = Carbon::now()->year;

    $suratMasukPerBulan = SuratMasuk::selectRaw('MONTH(tglSuratMasuk) as month, COUNT(*) as count')
        ->whereYear('tglSuratMasuk', $currentYear)
        ->groupBy('month')
        ->pluck('count', 'month')
        ->toArray();

    $suratKeluarPerBulan = SuratKeluar::selectRaw('MONTH(created_at) as month, COUNT(*) as count')
        ->whereYear('created_at', $currentYear)
        ->groupBy('month')
        ->pluck('count', 'month')
        ->toArray();

    $disposisiPerBulan = Disposisi::selectRaw('MONTH(created_at) as month, COUNT(*) as count')
        ->whereYear('created_at', $currentYear)
        ->groupBy('month')
        ->pluck('count', 'month')
        ->toArray();

    $suratDitolakPerBulan = SuratDitolak::selectRaw('MONTH(created_at) as month, COUNT(*) as count')
        ->whereYear('created_at', $currentYear)
        ->groupBy('month')
        ->pluck('count', 'month')
        ->toArray();

    return view('dashboard', [
        'suratMasukPerBulan' => $suratMasukPerBulan,
        'suratKeluarPerBulan' => $suratKeluarPerBulan,
        'disposisiPerBulan' => $disposisiPerBulan,
        'suratDitolakPerBulan' => $suratDitolakPerBulan,
    ]);
}
}
