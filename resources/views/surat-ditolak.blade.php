@php
    use Illuminate\Support\Facades\Auth;
    use Illuminate\Support\Facades\Route;
    use Carbon\Carbon;
    Carbon::setLocale('id');
@endphp
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Surat Ditolak') }}
        </h2>
    </x-slot>

    @if (session('success'))
        <div
            class="alert alert-success bg-green-500 text-center text-sm sm:text-lg py-2 font-semibold text-white drop-shadow">
            {{ session('success') }}
        </div>
    @endif

    <div class="p-5">
        <a href="{{ route('tambah-surat-ditolak') }}"
            class="w-32 h-2 p-2 rounded bg-lime-500 font-bold text-white drop-shadow hover:bg-lime-700">
            + Tambah Data
        </a>
    </div>

    <div class="px-2 sm:px-5 text-xs sm:text-base">
        <table class="w-full">
            <thead class="bg-blue-200 py-5 drop-shadow">
                <tr>
                    <th class="px-4 w-64">
                        No. Surat
                    </th>
                    <th class="px-4 w-60">
                        Asal Surat
                    </th>
                    <th class="px-4 w-40">
                        Perihal
                    </th>
                    <th class="px-4 w-40">
                        Tanggal Masuk Surat Ditolak
                    </th>
                    <th>
                        Alasan Surat Ditolak
                    </th>
                    <th class="px-4 w-40">
                        Aksi
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($suratditolak as $data)
                    <tr class="border-b-2 border-black">
                        <td class="px-3 text-center">{{ $data->noSurat }}</td>
                        <td class="px-3 text-center"> {{ $data->asalSurat }} </td>
                        <td class="px-3 text-justify">{{ $data->perihal }}</td>
                        <td class="px-3 text-center">
                            {{ Carbon::parse($data->tglMasukSuratDitolak)->translatedFormat('d F Y') }}
                        </td>
                        <td class="px-3 text-justify">{{ $data->alasan }}</td>
                        <td class="text-center">
                            @if (Auth::user()->roles == 'Super Admin')
                                <a href="{{ route('ViewSuratDitolak', $data->slug) }}"
                                    class="bg-blue-400 px-4 rounded-xl mx-2 text-white font-semibold hover:bg-blue-600">
                                    Lihat
                                </a>
                                <br>
                                <a href="{{ route('EditSuraDitolak', $data->slug) }}"
                                    class="bg-yellow-400 px-5 rounded-xl mx-2 text-white font-semibold hover:bg-yellow-600">
                                    Edit
                                </a>
                                <br>
                                <form action="{{ route('DeleteSuratDitolak', $data->slug) }}" method="POST">
                                    @csrf
                                    <button type="submit"
                                        class="bg-red-500 px-3 rounded-xl mx-2 text-white font-semibold hover:bg-red-700">
                                        Hapus
                                    </button>
                                </form>
                            @else
                                <a href=""
                                    class="bg-blue-400 px-4 rounded-xl mx-2 text-white font-semibold hover:bg-blue-600">
                                    Lihat
                                </a>
                                <br>
                                <a href=""
                                    class="bg-yellow-400 px-5 rounded-xl mx-2 text-white font-semibold hover:bg-yellow-600">
                                    Edit
                                </a>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>
