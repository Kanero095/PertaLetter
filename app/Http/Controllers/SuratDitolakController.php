<?php

namespace App\Http\Controllers;

use App\Models\SuratDitolak;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SuratDitolakController extends Controller
{
    public function TambahSuratDitolak()
    {
        return view('form.surat-ditolak');
    }

    public function tambahkanSuratDitolak(Request $request)
    {
        $validated = $request->validate([
            'asalSurat' => 'required|string',
            'noSurat' => 'required|string',
            'perihal' => 'required|string',
            'alasan' => 'required|string',
            'tglMasukSuratDitolak' => 'required|date',
            'fileSuratDitolak' => 'required|file|mimes:pdf|max:2048', // memastikan file PDF dan ukuran maksimal 2MB
        ]);

        $suratditolak = new SuratDitolak();

        $suratditolak->asalSurat = $request->asalSurat;
        $suratditolak->noSurat = $request->noSurat;
        $suratditolak->perihal = $request->perihal;
        $suratditolak->alasan = $request->alasan;
        $suratditolak->tglMasukSuratDitolak = $request->tglMasukSuratDitolak;

        $slug = Str::slug($request->noSurat . '-' . $request->perihal. '-' . Str::random(10));

        $count = SuratDitolak::where('slug', 'LIKE', "{$slug}%")->count();
        $slug = $count ? "{$slug}-{$count}" : $slug;

        $suratditolak->slug = $slug;

        $fileName = 'Berkas_' . $request->asalSurat . '_' . $request->tglMasukSuratDitolak . '.pdf';
        $filePath = $request->file('fileSuratDitolak')->storeAs('Surat-Ditolak/' . $request->tglMasukSuratDitolak, $fileName);

        $suratditolak->fileSuratDitolak = $filePath;
        $suratditolak->save();
        return redirect('/surat-ditolak')->with('success', 'Surat Ditolak berhasil ditambahkan');
        // return dd($suratditolak);
    }

    public function DeleteSuratDitolak($slug)
    {
        $suratditolak = SuratDitolak::where('slug', $slug)->delete();
        return back()->with('success', 'Surat Ditolak berhasil dihapus');
    }

    public function updateSuratDitolak($slug, Request $request)
    {
        // $file = SuratDitolak::where('slug', $slug)->first();
        $file = SuratDitolak::findOrFail($slug);

        if ($request->hasFile('fileSuratDitolak')) {
            $fileName = 'Berkas_Edit_' . $request->asalSurat . '_' . $request->tglMasukSuratDitolak . '.pdf';
            $filePath = $request->file('fileSuratDitolak')->storeAs('Surat-Ditolak/' . $request->tglMasukSuratDitolak, $fileName);
        } else {
            $filePath = $file->fileSuratDitolak;
        }

        $Newslug = Str::slug($request->noSurat . '-' . $request->perihal);

        $count = SuratDitolak::where('slug', 'LIKE', "{$Newslug}%")->count();
        $Newslug = $count ? "{$Newslug}-{$count}" : $Newslug;

        $suratditolak = SuratDitolak::findOrFail($slug)->update([
            'asalSurat' => request('asalSurat'),
            'noSurat' => request('noSurat'),
            'perihal' => request('perihal'),
            'alasan' => request('alasan'),
            'tglMasukSuratDitolak' => request('tglMasukSuratDitolak'),
            'fileSuratDitolak' => $filePath,
            'slug' => $Newslug,
        ]);

        if ($suratditolak) {
            return redirect('/surat-ditolak')->with('success', 'Surat Ditolak berhasil diubah');
        }
    }

    public function editSuratDitolak($slug)
    {
        $suratditolak = SuratDitolak::where('slug', $slug)->firstOrFail();

        if (!$suratditolak) {
            return redirect()->back()->with('error', 'Surat Masuk tidak ditemukan');
        }

        $tglSuratDitolak = $suratditolak->tglMasukSuratDitolak;
        $file = $suratditolak->fileSuratDitolak;

        $filePath = 'Surat-Ditolak/' . $tglSuratDitolak . '/' . $file;

        return view('form.edit-surat-ditolak', compact('suratditolak', 'filePath'));
    }
    public function showPDFDitolak($slug)
    {
        $suratditolak = SuratDitolak::findOrFail($slug);

        if (!$suratditolak) {
            return redirect()->back()->with('error', 'Surat Masuk tidak ditemukan');
        }

        $tglSurat = $suratditolak->tglMasukSuratDitolak;
        $filePath = $suratditolak->fileSuratDitolak;

        $fullPath = storage_path('app/private/' . $filePath);

        if (!file_exists($fullPath)) {
            abort(404, 'File tidak ditemukan.');
        }

        return response()->file($fullPath);
    }

    public function viewSuratDitolak($slug)
    {
        $suratditolak= SuratDitolak::where('slug', $slug)->first();

        $tglMasukSuratDitolak= $suratditolak->tglMasukSuratDitolak;
        $file = $suratditolak->fileSuratDitolak;

        $filePath = 'Surat-Ditolak/' . $tglMasukSuratDitolak. '/' . $file;

        return view('lihat-surat-ditolak', compact('suratditolak', 'filePath'));
    }


}
