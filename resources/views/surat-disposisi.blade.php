@php
    use Illuminate\Support\Facades\Auth;
    use Illuminate\Support\Facades\Route;
    use Carbon\Carbon;
    Carbon::setLocale('id');
@endphp
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Surat Disposisi') }}
        </h2>
    </x-slot>

    @if (session('success'))
        <div
            class="alert alert-success bg-green-500 text-center text-sm sm:text-lg py-2 font-semibold text-white drop-shadow">
            {{ session('success') }}
        </div>
    @endif

    <div class="p-5">
        <a href="{{ route('tambah') }}"
            class="w-32 h-2 p-2 rounded bg-lime-500 font-bold text-white drop-shadow hover:bg-lime-700">
            + Tambah Data
        </a>
    </div>

    <div class="px-2 sm:px-5 text-xs sm:text-base">
        <table class="w-full">
            <thead class="bg-blue-200 py-5 drop-shadow">
                <tr>
                    <th class="px-4 w-56">
                        No. Surat
                    </th>
                    <th class="px-4 w-60">
                        Tujuan Surat
                    </th>
                    <th class="px-4 w-52">
                        Perihal
                    </th>
                    <th class="px-4 w-40">
                        Tanggal Surat Disposisi Dibuat
                    </th>
                    <th class="px-4 w-40">
                        Aksi
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($suratdisposisi as $data)
                    <tr class="border-b-2 border-black">
                        <td class="px-3 text-center">{{ $data->noSuratDisposisi }}</td>
                        <td class="px-3 text-center"> {{ $data->kepada }} </td>
                        <td class="px-3 text-justify">{{ $data->perihal }}</td>
                        <td class="px-3 text-center">
                            {{ Carbon::parse($data->tglSuratdibuat)->translatedFormat('d F Y') }} </td>
                        <td class="text-center">
                            <a href="{{ route('viewSuratDisposisi', $data->slug) }}"
                                class="bg-blue-400 px-4 rounded-xl mx-2 text-white font-semibold hover:bg-blue-600">
                                Lihat
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>
