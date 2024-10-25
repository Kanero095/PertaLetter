<x-app-layout>

    <div class="mt-3 ml-5">
        <a href="{{ route('suratmasuk') }}"
            class="px-3 py-1 bg-orange-400 rounded-3xl font-semibold hover:bg-orange-700 hover:font-bold hover:text-white">
            Back
        </a>
    </div>

    <div class="px-3 sm:px-5 py-5">
        <div class="bg-white px-7 py-4 rounded-xl">
            <table class="w-full mx-auto">
                <p class="text-2xl font-bold text-center mt-2 mb-3 underline">
                    SURAT MASUK
                </p>
                <tr class="border-b">
                    <td class="w-60 font-semibold">
                        Asal Surat
                    </td>
                    <td>
                        : {{ $suratmasuk->asalSuratMasuk }}
                    </td>
                </tr>
                <tr class="border-b">
                    <td class="w-60 font-semibold">
                        Nomor Surat
                    </td>
                    <td>
                        : {{ $suratmasuk->noSurat }}
                    </td>
                </tr>
                <tr class="border-b">
                    <td class="w-60 font-semibold">
                        Tanggal
                    </td>
                    <td>
                        : {{ $suratmasuk->tglSuratMasuk }}
                    </td>
                </tr>
                <tr class="border-b">
                    <td class="w-60 font-semibold">
                        Perihal
                    </td>
                    <td>
                        : {{ $suratmasuk->perihal }}
                    </td>
                </tr>
                <tr class="border-b">
                    <td class="w-60 font-semibold">
                        Isi Ringkas
                    </td>
                    <td>
                        : {{ $suratmasuk->isiRingkas }}
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        @if ($filePath)
                            <div class="mt-4">
                                <label for="existingFile" class="block text-sm font-medium text-gray-700">File Surat
                                    Masuk Saat
                                    Ini:</label>

                                <iframe src="{{ route('pdf.show', $suratmasuk->id) }}" width="100%" height="500px"
                                    class="rounded"></iframe>
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
