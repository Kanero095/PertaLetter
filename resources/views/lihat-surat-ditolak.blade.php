@php
    use Illuminate\Support\Facades\Auth;
    use Illuminate\Support\Facades\Route;
    use Carbon\Carbon;
    Carbon::setLocale('id');
@endphp
<x-app-layout>

    <div class="mt-3 ml-5">
        <a href="{{ route('suratditolak') }}"
            class="px-3 py-1 bg-orange-400 rounded-3xl font-semibold hover:bg-orange-700 hover:font-bold hover:text-white">
            Back
        </a>
    </div>

    <div class="px-3 sm:px-5 py-5">
        <div class="bg-white px-7 py-3 rounded-xl">
            <table class="w-full mx-auto">
                <p class="text-2xl font-bold text-center mt-2 mb-3 underline">
                    SURAT DITOLAK
                </p>
                <tr class="border-b">
                    <td class="w-60 font-semibold">
                        Asal Surat
                    </td>
                    <td>
                        : {{ $suratditolak->asalSurat }}
                    </td>
                </tr>
                <tr class="border-b">
                    <td class="w-60 font-semibold">
                        Nomor Surat
                    </td>
                    <td>
                        : {{ $suratditolak->noSurat }}
                    </td>
                </tr>
                <tr class="border-b">
                    <td class="w-60 font-semibold">
                        Tanggal Masuknya Surat Ditolal
                    </td>
                    <td>
                        : {{ Carbon::parse($suratditolak->tglMasukSuratDitolak)->translatedFormat('d F Y') }}
                    </td>
                </tr>
                <tr class="border-b">
                    <td class="w-60 font-semibold">
                        Perihal
                    </td>
                    <td>
                        : {{ $suratditolak->perihal }}
                    </td>
                </tr>
                <tr class="border-b">
                    <td class="w-60 font-semibold">
                        Alasan Ditolak
                    </td>
                    <td>
                        : {{ $suratditolak->alasan }}
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        @if ($filePath)
                            <div class="mt-4">
                                <label for="existingFile" class="block text-sm font-medium text-gray-700">File Surat
                                    Ditolak :</label>

                                <iframe src="{{ route('pdf.ShowDitolak', $suratditolak->id) }}" width="100%"
                                    height="650px" class="rounded"></iframe>
                            </div>
                        @else
                            <p class="text-red-600">File tidak ditemukan</p>
                        @endif
                    </td>
                </tr>
            </table>
        </div>
    </div>
</x-app-layout>
