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
        $tgl = date('d-m-y');
        $dateFormatted = Carbon::parse($tgl)->translatedFormat('d F Y');
        $data = [
            'kota' => $request->input('kota'),
            'tglSuratdibuat' => $dateFormatted,
            'noSuratDisposisi' => $request->input('noSuratDisposisi'),
            'lampiran' => $request->input('lampiran'),
            'perihal' => $request->input('perihal'),
            'kepada' => $request->input('kepada'),
            'lokasi' => $request->input('lokasiTujuan'),
            'noSuratdibalas' => $request->input('noSuratdibalas'),
            'tglSuratMasuk' => $request->input('tglSuratMasuk'),
            'ditempatkan' => $request->input('ditempatkan'),
            'nama' => $request->input('nama'),
            'jurusan' => $request->input('jurusan'),
            'pembimbing' => $request->input('pembimbing'),
            'tglMulai' => $request->input('tglMulai'),
            'tglBerakhir'=> $request->input('tglBerakhir'),
            'image' => $this->base64_encode_image('image/logo_kop/Logo_Pertamina.png'),
            'skkmigas' => $this->base64_encode_image('image/logo_kop/SKK-Migas-logo.webp'),
        ];

        $pdf = PDF::loadView('baru', $data);

        $fileName = 'Surat_Konfirmasi_' . $request->perihal . $request->tujuan . '-' . $dateFormatted . '.pdf';
        $filePath = 'pdfs/' . $fileName;

        Storage::put('public/' . $filePath, $pdf->output());

        $slug = Str::slug($request->perihal . '-' . $request->perihal . '-' . Str::random(10));

        $count = Disposisi::where('slug', 'LIKE', "{$slug}%")->count();
        $slug = $count ? "{$slug}-{$count}" : $slug;

        // Simpan data hanya file_name dan file_path ke database
        Disposisi::create([
            'kota' =>$request->kota,
            'tglSuratDibuat' => $dateFormatted,
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
            'slug' => $slug,
            'file_name' => $fileName,
            'file_path' => 'storage/' . $filePath,
        ]);

        return $pdf->download($fileName);
    }

    private function base64_encode_image($image_path)
    {
        $image = file_get_contents(public_path($image_path));
        return 'data:image/png;base64,' . base64_encode($image);
    }
}
