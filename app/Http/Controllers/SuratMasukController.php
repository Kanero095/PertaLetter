<?php

namespace App\Http\Controllers;

use App\Models\SuratMasuk;
use Illuminate\Http\Request;

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

        $fileName = 'Berkas_' . $request->asalSuratMasuk . '_' . $request->tglSuratMasuk . '.pdf';
        $filePath = $request->file('fileSuratMasuk')->storeAs('Surat-Masuk/' . $request->tglSuratMasuk, $fileName);

        $suratmasuk->fileSuratMasuk = $filePath;
        $suratmasuk->save();
        return redirect('/surat-masuk')->with('success', 'Surat Masuk berhasil ditambahkan');
    }

    public function DeleteSuratMasuk($id)
    {
        $suratmasuk = SuratMasuk::find($id)->delete();
        return back()->with('success', 'Surat Masuk berhasil dihapus');
    }

    public function editSuratMasuk($id)
{
    $suratmasuk = SuratMasuk::find($id);

    if (!$suratmasuk) {
        return redirect()->back()->with('error', 'Surat Masuk tidak ditemukan');
    }

    // Ambil tanggal surat masuk dari database (pastikan field ini ada di model SuratMasuk)
    $tglSuratMasuk = $suratmasuk->tglSuratMasuk;
    $file = $suratmasuk->fileSuratMasuk;

    // Buat jalur lengkap ke file PDF (file_path di database hanya berisi nama file)
    $filePath = 'Surat-Masuk/' . $tglSuratMasuk . '/' . $file;

    return view('form.edit-surat-masuk', compact('suratmasuk', 'filePath'));
}

    public function updateSuratMasuk($id, Request $request)
    {
        $fileName = 'Berkas_Edit_' . $request->asalSuratMasuk . '_' . $request->tglSuratMasuk . '.pdf';
        $filePath = $request->file('fileSuratMasuk')->storeAs('Surat-Masuk/' . $request->tglSuratMasuk, $fileName);

        $suratmasuk = SuratMasuk::find($id)->update([
            'asalSuratMasuk' => request('asalSuratMasuk'),
            'noSurat' => request('noSurat'),
            'perihal' => request('perihal'),
            'isiRingkas' => request('isiRingkas'),
            'tglSuratMasuk' => request('tglSuratMasuk'),
            'fileSuratMasuk' => $filePath,
        ]);

        if ($suratmasuk) {
            return redirect('/surat-masuk')->with('success', 'Surat Masuk berhasil diubah');
        }
    }

    public function showPDF($id)
{
    $suratmasuk = SuratMasuk::find($id);

    if (!$suratmasuk) {
        return redirect()->back()->with('error', 'Surat Masuk tidak ditemukan');
    }

    // Ambil tanggal surat masuk dan nama file dari database
    $tglSuratMasuk = $suratmasuk->tglSuratMasuk;
    $filePath = $suratmasuk->fileSuratMasuk;

    // Bangun path lengkap ke file di dalam storage private
    $fullPath = storage_path('app/private/' . $filePath);

    // Cek apakah file ada
    if (!file_exists($fullPath)) {
        abort(404, 'File tidak ditemukan.');
    }

    // Tampilkan file PDF di browser
    return response()->file($fullPath);
}
}
