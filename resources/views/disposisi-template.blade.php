<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surat Mahasiswa</title>
    {{-- TailwindCSS --}}
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        #tabel,
        #teet,
        #tidi {
            width: 100%;
            text-align: center;
            border: 1px solid black;
        }

        #tabel {
            border-collapse: collapse;
        }
    </style>
</head>

<body class="pb-3 pl-4 pr-3 bg-black">

    <table class="bg-white mx-auto">
        <thead>
            <tr>
                <td>
                    <img src="{{ $skkmigas }}" alt="" style="width: 5rem; height:3rem;">
                </td>
                <td>
                    <img src="{{ $image }}" alt="" class="opacity-65"
                        style="width: 8rem; height:4rem; margin-left:465px">
                </td>
            </tr>
        </thead>
        <tr>
            <td colspan="3">
                <p style="line-height: 1.3">
                    <span style="text-transform: capitalize;">{{ $kota }}, {{ $tglSuratdibuat }}</span>

                    <br>

                    No. {{ $noSuratDisposisi }}
                </p>

                <p style="line-height: 1.3; text-transform:capitalize;">
                    Lampiran <span style="margin-left: 10px;">: {{ $lampiran }}</span> Lembar

                    <br>

                    Perihal <span style="margin-left: 27px;">:</span><span style="font-weight:bold;">
                        {{ $perihal }}</span>
                </p>

                <p style="line-height: 1.3">
                    Kepada Yth, <br>
                    <span style="text-transform: capitalize; font-weight:bold;"> {{ $kepada }} </span> <br>
                    <span style="text-transform: capitalize;"> {{ $lokasi }} </span>
                </p>

                <p style="line-height: 1.3; text-align:justify;">
                    Dengan Hormat, <br>
                    Menjawab Surat Saudara No. {{ $noSuratdibalas }} pada tanggal {{ $tglSuratMasuk }} perihal
                    {{ $perihal }} dengan ini disampaikan bahwa kami dapat menerima mahasiswa dimaksud
                    di {{ $ditempatkan }}, sebagai berikut:
                </p>

                <table id="tabel" class="w-full mt-5">
                    <thead>
                        <tr id="teer">
                            <td id="tidi" class="text-center">
                                No.
                            </td>
                            <td id="tidi" class="text-center" style="width: 100px">
                                Nama
                            </td>
                            <td id="tidi" class="text-center" style="width: 100px">
                                Jurusan
                            </td>
                            <td id="tidi" class="text-center" style="width: 150px">
                                Pembimbing
                            </td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr id="teer">
                            <td id="tidi" style="width: 30px;">
                                1
                            </td>
                            <td id="tidi" style="text-align: left; padding-left:5px;" class="px-2">
                                {{ $nama }}
                            </td>
                            <td id="tidi" class="px-2">
                                {{ $jurusan }}
                            </td>
                            <td id="tidi" class="px-2">
                                <span style="font-weight: bold;">
                                    {{ $pembimbing }}
                                </span>
                            </td>
                        </tr>
                    </tbody>
                </table>

                <p style="text-align: justify;">
                    Dapat kami informasikan bahwa untuk melaksanakan Kerja Praktik di Zona 4 secara offline
                    selama tmt <span style="font-weight: bold;"> {{ $tglMulai }} - {{ $tglBerakhir }}</span>.
                </p>

                <p style="text-align: justify;">
                    Sehubungan pelaksanaan tersebut, diharapkan agar mahasiswa yang bersangkutan melaksanakan ketentuan
                    sebagai berikut :
                <ol style="text-align: justify;">
                    <li>
                        Mentaati/mematuhi semua perintah/petunjuk yang diberikan oleh pembimbing yang ditentukan oleh
                        pimpinan PT Pertamina Hulu Rokan Zona 4.
                    </li>
                    <li>
                        Mentaati/mematuhi semua peraturan PT Pertamina Hulu Rokan Zona 4 yang berlaku di tempat kerja.
                    </li>
                    <li>
                        Berpakaian rapi dan sopan.
                    </li>
                    <li>
                        Masing-masing Mahasiswa <i style="font-weight: bold">diwajibkan</i> menyerahkan laporan Kerja
                        Praktek/Tugas Akhir setelah selesai pelaksaan dalam bentuk hardcopy (sudah ditandatangi
                        Pembimbing Lapangan) atau softcopy format PDF, kemudian diserahkan ke Fungsi HC Zona 4.
                    </li>
                    <li>
                        Menyerahkan pas photo 4 x 6 (1 lembar) dan fotocopy kartu Mahasiswa (1 lembar) pada saat hari
                        Pertama pelaksanaan Kerja Praktek . Tugas Akhir dimulai di Zona 4 HC.
                    </li>
                    <li>
                        Menyerahkan Surat Pernyataan Pribadi Bebas dari Narkoba Bermaterai.
                    </li>
                    <li>
                        Menyerahkan Surat Keterangan Sehat dari Dokter/Puskesmas/Rumah Sakit.
                    </li>
                    <li>
                        Merahasiakan semua data yang diperoleh selama melaksankan Kerja Prakter dan Tugas Akhir.
                    </li>
                    <li>
                        Akomodasi, transportasi, makan, Alat pelindung Diri / APD (Coveral, Safety Helmet, Safety Shoes
                        dll) disiapkan oleh Mahasiswa yang bersangkutan.
                    </li>
                </ol>
                </p>

            </td>
        </tr>
    </table>

    <div style="border-bottom: 20px solid red; border-radius: 0 10cm 0 0; width:100%; margin-top:100px;">
        <p style="font-size: 10px; margin-left:555px;">
            PT Pertamina Hulu Rokan Zona 4 <br>
            Jl. Jend. Sudirman No.3 Prabumulih <br>
            Sumatera Selatan 31122 <br>
            www.pertamina-ep.com
        </p>
    </div>
</body>

</html>
