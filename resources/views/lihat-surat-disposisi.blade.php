@php
    use Illuminate\Support\Facades\Auth;
    use Illuminate\Support\Facades\Route;
    use Carbon\Carbon;
    Carbon::setLocale('id');
@endphp
<x-app-layout>

    <div class="mt-3 ml-5">
        <a href="{{ route('suratdisposisi') }}"
            class="px-3 py-1 bg-orange-400 rounded-3xl font-semibold hover:bg-orange-700 hover:font-bold hover:text-white">
            Back
        </a>
    </div>

    <div class="px-3 sm:px-5 py-5">
        <div class="bg-white px-7 py-3 rounded-xl">
            <table class="w-full mx-auto">
                <p class="text-2xl font-bold text-center mt-2 mb-3 underline">
                    SURAT DISPOSISI
                </p>
                <tr class="border-b">
                    <td class="w-60 font-semibold">
                        Tujuan Surat Disposisi
                    </td>
                    <td>
                        : {{ $disposisi->kepada }}
                    </td>
                </tr>
                <tr class="border-b">
                    <td class="w-60 font-semibold">
                        Nomor Surat Disposisi
                    </td>
                    <td>
                        : {{ $disposisi->noSuratDisposisi }}
                    </td>
                </tr>
                <tr class="border-b">
                    <td class="w-60 font-semibold">
                        Tanggal Surat Disposisi dibuat
                    </td>
                    <td>
                        : {{ Carbon::parse($disposisi->tgldisposisi)->translatedFormat('d F Y') }}
                    </td>
                </tr>
                <tr class="border-b">
                    <td class="w-60 font-semibold">
                        Perihal Surat
                    </td>
                    <td>
                        : {{ $disposisi->perihal }}
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        @if ($filePath)
                            <div class="mt-4">
                                <label for="existingFile" class="block text-sm font-medium text-gray-700">File Surat
                                    Disposisi Saat Ini:
                                </label>

                                <iframe src="{{ route('pdf.showDisposisi', $disposisi->slug) }}" width="100%"
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
