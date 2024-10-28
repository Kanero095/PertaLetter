<?php

namespace App\Http\Controllers;

use App\Models\SuratKeluar;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SuratKeluarController extends Controller
{
    public function TambahSuratKeluar()
    {
        return view('form.surat-keluar');
    }

    public function SuratKeluar(Request $request)
    {
        $suratkeluar = new SuratKeluar();

        $suratkeluar->tujuanSuratKeluar = $request->tujuanSuratKeluar;
        $suratkeluar->noSurat = $request->noSurat;
        $suratkeluar->perihal = $request->perihal;
        $suratkeluar->isiRingkas= $request->isiRingkas;
        $suratkeluar->tglSuratKeluar = $request->tglSuratKeluar;

        $slug = Str::slug($request->noSurat . '-' . $request->perihal . '-' . Str::random(10));

        $count = SuratKeluar::where('slug', 'LIKE', "{$slug}%")->count();
        $slug = $count ? "{$slug}-{$count}" : $slug;

        $suratkeluar->slug = $slug;

        $fileName = 'Berkas_Untuk_' . $request->tujuanSuratKeluar . '_' . $request->tglSuratKeluar . '.pdf';
        $filePath = $request->file('fileSuratKeluar')->storeAs('Surat-Keluar/' . $request->tglSuratKeluar, $fileName);

        $suratkeluar->fileSuratKeluar = $filePath;
        $suratkeluar->save();
        return redirect('/surat-keluar')->with('success', 'Surat Keluar berhasil ditambahkan');
    }

    public function DeleteSuratKeluar($slug)
    {
        $suratkeluar = SuratKeluar::where('slug', $slug)->delete();
        return back()->with('success', 'Surat Keluar berhasil dihapus');
    }

    public function editSuratKeluar($slug)
    {
        $suratkeluar = SuratKeluar::where('slug', $slug)->firstOrFail();

        if (!$suratkeluar) {
            return redirect()->back()->with('error', 'Surat Keluar tidak ditemukan');
        }

        $tglSuratKeluar = $suratkeluar->tglSuratKeluar;
        $file = $suratkeluar->fileSuratKeluar;

        $filePath = 'Surat-Keluar/' . $tglSuratKeluar . '/' . $file;

        return view('form.edit-surat-keluar', compact('suratkeluar', 'filePath'));
    }

    public function showPDF($slug)
    {
        $suratkeluar = SuratKeluar::findOrFail($slug);

        if (!$suratkeluar) {
            return redirect()->back()->with('error', 'Surat Keluar tidak ditemukan');
        }

        $filePath = $suratkeluar->fileSuratKeluar;

        $fullPath = storage_path('app/private/' . $filePath);

        if (!file_exists($fullPath)) {
            abort(404, 'File tidak ditemukan.');
        }

        // Tampilkan file PDF di browser
        return response()->file($fullPath);
    }

    public function updateSuratKeluar($slug, Request $request)
    {
        // $file = SuratMasuk::where('slug', $slug)->first();
        $file = SuratKeluar::findOrFail($slug);

        if ($request->hasFile('fileSuratKeluar')) {
            $fileName = 'Berkas_Edit_' . $request->tujuanSuratKeluar . '_' . $request->tglSuratKeluar . '.pdf';
            $filePath = $request->file('fileSuratKeluar')->storeAs('Surat-Keluar/' . $request->tglSuratKeluar, $fileName);
        } else {
            $filePath = $file->fileSuratKeluar;
        }

        $Newslug = Str::slug($request->noSurat . '-' . $request->perihal. '-' . Str::random(10));

        $count = SuratKeluar::where('slug', 'LIKE', "{$Newslug}%")->count();
        $Newslug = $count ? "{$Newslug}-{$count}" : $Newslug;

        $suratmasuk = SuratKeluar::findOrFail($slug)->update([
            'tujuanSuratKeluar' => request('tujuanSuratKeluar'),
            'noSurat' => request('noSurat'),
            'perihal' => request('perihal'),
            'isiRingkas' => request('isiRingkas'),
            'tglSuratKeluar' => request('tglSuratKeluar'),
            'fileSuratKeluar' => $filePath,
            'slug' => $Newslug,
        ]);

        if ($suratmasuk) {
            return redirect('/surat-keluar')->with('success', 'Surat Keluar berhasil diubah');
        }
    }

    public function viewSuratKeluar($slug)
    {
        $suratkeluar = SuratKeluar::where('slug', $slug)->first();

        $tglSuratKeluar = $suratkeluar->tglSuratKeluar;
        $file = $suratkeluar->fileSuratKeluar;

        $filePath = 'Surat-Keluar/' . $tglSuratKeluar . '/' . $file;

        return view('lihat-surat-keluar', compact('suratkeluar', 'filePath'));
    }
}
