<?php

namespace App\Http\Controllers;

use App\Models\SuratMasuk;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SuratMasukController extends Controller
{
    public function TambahsuratMasuk()
    {
        return  view('form.surat-masuk');
    }

    public function SuratMasuk(Request $request)
    {
        $validated = $request->validate([
            'asalSuratMasuk' => 'required|string',
            'noSurat' => 'required|string',
            'perihal' => 'required|string',
            'isiRingkas' => 'required|string',
            'tglSuratMasuk' => 'required|date',
            'fileSuratMasuk' => 'required|file|mimes:pdf|max:2048', // memastikan file PDF dan ukuran maksimal 2MB
        ]);

        $suratmasuk = new SuratMasuk();

        $suratmasuk->asalSuratMasuk = $request->asalSuratMasuk;
        $suratmasuk->noSurat = $request->noSurat;
        $suratmasuk->perihal = $request->perihal;
        $suratmasuk->isiRingkas = $request->isiRingkas;
        $suratmasuk->tglSuratMasuk = $request->tglSuratMasuk;

        $slug = Str::slug($request->noSurat . '-' . $request->perihal. '-' . Str::random(10));

        $count = SuratMasuk::where('slug', 'LIKE', "{$slug}%")->count();
        $slug = $count ? "{$slug}-{$count}" : $slug;

        $suratmasuk->slug = $slug;

        $fileName = 'Berkas_' . $request->asalSuratMasuk . '_' . $request->tglSuratMasuk . '.pdf';
        $filePath = $request->file('fileSuratMasuk')->storeAs('Surat-Masuk/' . $request->tglSuratMasuk, $fileName);

        $suratmasuk->fileSuratMasuk = $filePath;
        $suratmasuk->save();
        return redirect('/surat-masuk')->with('success', 'Surat Masuk berhasil ditambahkan');
    }

    public function DeleteSuratMasuk($slug)
    {
        $suratmasuk = SuratMasuk::where('slug', $slug)->delete();
        return back()->with('success', 'Surat Masuk berhasil dihapus');
    }

    public function editSuratMasuk($slug)
    {
        $suratmasuk = SuratMasuk::where('slug', $slug)->firstOrFail();

        if (!$suratmasuk) {
            return redirect()->back()->with('error', 'Surat Masuk tidak ditemukan');
        }

        $tglSuratMasuk = $suratmasuk->tglSuratMasuk;
        $file = $suratmasuk->fileSuratMasuk;

        $filePath = 'Surat-Masuk/' . $tglSuratMasuk . '/' . $file;

        return view('form.edit-surat-masuk', compact('suratmasuk', 'filePath'));
    }

    public function updateSuratMasuk($slug, Request $request)
    {
        // $file = SuratMasuk::where('slug', $slug)->first();
        $file = SuratMasuk::findOrFail($slug);

        if ($request->hasFile('fileSuratMasuk')) {
            $fileName = 'Berkas_Edit_' . $request->asalSuratMasuk . '_' . $request->tglSuratMasuk . '.pdf';
            $filePath = $request->file('fileSuratMasuk')->storeAs('Surat-Masuk/' . $request->tglSuratMasuk, $fileName);
        } else {
            $filePath = $file->fileSuratMasuk;
        }

        $Newslug = Str::slug($request->noSurat . '-' . $request->perihal);

        $count = SuratMasuk::where('slug', 'LIKE', "{$Newslug}%")->count();
        $Newslug = $count ? "{$Newslug}-{$count}" : $Newslug;

        $suratmasuk = SuratMasuk::findOrFail($slug)->update([
            'asalSuratMasuk' => request('asalSuratMasuk'),
            'noSurat' => request('noSurat'),
            'perihal' => request('perihal'),
            'isiRingkas' => request('isiRingkas'),
            'tglSuratMasuk' => request('tglSuratMasuk'),
            'fileSuratMasuk' => $filePath,
            'slug' => $Newslug,
        ]);

        if ($suratmasuk) {
            return redirect('/surat-masuk')->with('success', 'Surat Masuk berhasil diubah');
        }
    }

    public function showPDF($slug)
    {
        $suratmasuk = SuratMasuk::findOrFail($slug);

        if (!$suratmasuk) {
            return redirect()->back()->with('error', 'Surat Masuk tidak ditemukan');
        }

        $tglSuratMasuk = $suratmasuk->tglSuratMasuk;
        $filePath = $suratmasuk->fileSuratMasuk;

        $fullPath = storage_path('app/private/' . $filePath);

        if (!file_exists($fullPath)) {
            abort(404, 'File tidak ditemukan.');
        }

        return response()->file($fullPath);
    }

    public function viewSuratMasuk($slug)
    {
        $suratmasuk = SuratMasuk::where('slug', $slug)->first();

        $tglSuratMasuk = $suratmasuk->tglSuratMasuk;
        $file = $suratmasuk->fileSuratMasuk;

        $filePath = 'Surat-Masuk/' . $tglSuratMasuk . '/' . $file;

        return view('lihat-surat-masuk', compact('suratmasuk', 'filePath'));
    }
}
