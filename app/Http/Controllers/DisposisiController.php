<?php

namespace App\Http\Controllers;

use App\Models\Disposisi;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class DisposisiController extends Controller
{
    public function tambah()
    {
        return view('form.surat-disposisi');
    }

    public function generate(Request $request)
    {
        Carbon::setLocale('id');
        $tgl = Carbon::now();
        $tglDisposisi = Carbon::parse($tgl)->format('Y-m-d');
        $dateFormatted = Carbon::parse($tgl)->translatedFormat('d F Y');

        $tglSuratMasukFormatted = Carbon::parse($request->tglMulai)->translatedFormat('d F Y');

        $tglMulaiFormatted = Carbon::parse($request->tglMulai)->translatedFormat('d F Y');
        $tglBerakhirFormatted = Carbon::parse($request->tglBerakhir)->translatedFormat('d F Y');
        $data = [
            'kota' => $request->input('kota'),
            'tglSuratdibuat' => $dateFormatted,
            'noSuratDisposisi' => $request->input('noSuratDisposisi'),
            'lampiran' => $request->input('lampiran'),
            'perihal' => $request->input('perihal'),
            'kepada' => $request->input('kepada'),
            'lokasi' => $request->input('lokasiTujuan'),
            'noSuratdibalas' => $request->input('noSuratdibalas'),
            'tglSuratMasuk' => $tglSuratMasukFormatted,
            'ditempatkan' => $request->input('ditempatkan'),
            'nama' => $request->input('nama'),
            'jurusan' => $request->input('jurusan'),
            'pembimbing' => $request->input('pembimbing'),
            'tglMulai' => $tglMulaiFormatted,
            'tglBerakhir'=> $tglBerakhirFormatted,
            'image' => $this->base64_encode_image('Image/Logo/Logo-Pertamina-Hulu-Rokan.png'),
            'skkmigas' => $this->base64_encode_image('Image/Logo/SKK-Migas-logo.webp'),
        ];

        $pdf = PDF::loadView('../disposisi-template', $data);

        $fileName = 'Surat_' . $request->perihal . $request->tujuan . '-' . $dateFormatted . '.pdf';
        $filePath = $tglDisposisi .'/' . $fileName;

        Storage::put('Surat-Disposisi/'. $filePath, $pdf->output());

        $slug = Str::slug($request->perihal . '-' . $request->kepada . '-' . Str::random(10));

        // Simpan data hanya file_name dan file_path ke database
        Disposisi::create([
            'kota' =>$request->kota,
            'noSuratDisposisi' =>$request->noSuratDisposisi,
            'tglSuratDibuat' => $tgl,
            'noSuratDibuat' =>$request->noSuratDibuat,
            'lampiran' =>$request->lampiran,
            'perihal' =>$request->perihal,
            'kepada'=>$request->kepada,
            'lokasiTujuan'=>$request->lokasiTujuan,
            'noSuratdibalas'=>$request->noSuratdibalas,
            'tglSuratMasuk'=>$request->tglSuratMasuk,
            'nama' => $request->nama,
            'jurusan' =>$request->jurusan,
            'pembimbing'=>$request->pembimbing,
            'ditempatkan'=>$request->ditempatkan,
            'tglMulai'=>$request->tglMulai,
            'tglBerakhir'=>$request->tglBerakhir,
            'fileDisposisi' => $filePath,
            'slug'=>$slug,
            'file_name' => $fileName,
            'file_path' => $filePath,
        ]);

        return $pdf->download($fileName);
    }

    private function base64_encode_image($image_path)
    {
        $image = file_get_contents(public_path($image_path));
        return 'data:image/png;base64,' . base64_encode($image);
    }

    public function disposisi($slug)
    {
        // $disposisi = Disposisi::findOrFail($slug);
        $disposisi = Disposisi::where('slug', $slug)->firstOrFail();

        if (!$disposisi) {
            return redirect()->back()->with('error', 'Surat Keluar tidak ditemukan');
        }

        $filePath = 'app/private/Surat-Disposisi/'.$disposisi->file_path;

        $fullPath = storage_path($filePath);

        if (!file_exists($fullPath)) {
            abort(404, 'File tidak ditemukan.');
        }

        // Tampilkan file PDF di browser
        return response()->file($fullPath);
    }

    public function viewDisposisi($slug)
    {
        $disposisi = Disposisi::where('slug', $slug)->first();

        $tglSuratdibuat = $disposisi->tglSuratdibuat;

        $file = $disposisi->file_path;

        $filePath = 'Surat-Disposisi/' . $file;

        return view('lihat-surat-disposisi', compact('disposisi', 'filePath'));
        // return dd($filePath);
    }
}
