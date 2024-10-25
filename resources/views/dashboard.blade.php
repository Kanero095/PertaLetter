<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="mt-3">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                {{-- instansi --}}
                <div class="px-5 py-5 mx-auto">
                    <div class="grid grid-cols-3">
                        <div>
                            {{-- kosong --}}
                        </div>
                        <img src="{{ asset('Image/Logo/pertamina-2.png') }}" alt=""
                            class="size-36 w-auto mx-auto my-2 sm:size-56 sm:w-auto">
                        <img src="{{ asset('Image/Logo/pertamina.png') }}" alt=""
                            class="size-28 w-auto mx-auto my-2 sm:size-36 sm:w-auto">
                    </div>
                    <p class="text-center mx-auto mt-3 w-3/4 text-sm sm:text-base">
                        Alamat : Jl. Plaju no.38 Komperta Pendopo, Talang Ubi Kab Penukal Abab Lematang Ilir (PALI)
                        Sumatra Selatan 31211.
                    </p>
                    <p class="text-center mx-auto text-blue-500 w-3/4 text-sm sm:text-base">
                        <a href="http://www.pertamina-ep.com" target="_blank"
                            class="hover:text-blue-700 hover:font-bold">
                            www.pertamina-ep.com
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="mt-3">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                {{-- Welcome to user --}}
                <div class="px-5 pt-5 pb-3 mb-5">
                    <p class="text-xl mb-2 sm:text-3xl">
                        Selamat Datang <span class="font-bold">{{ Auth::user()->name }}</span>
                    </p>
                    @if (Auth::user()->roles == 'Super Admin')
                        <p class="text-sm sm:text-lg">
                            Anda login sebagai <span class="font-bold">{{ Auth::user()->roles }}</span>, Anda memiliki
                            akses secara keseluruhan.
                        </p>
                    @else
                        <p class="text-sm sm:text-lg">
                            Anda login sebagai <span class="font-bold">{{ Auth::user()->roles }}</span>, Anda memiliki
                            akses Menambah dan Mengedit.
                        </p>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div class="mt-3">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                {{-- content --}}
                <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 justify-center h-80 lg:h-48 rounded">
                    <div class="h-full item-center w-full border-r-2 border-black dark:border-white bg-orange-400">
                        <p class="text-sm md:text-lg text-black text-center font-bold mt-16">
                            Jumlah Surat Masuk
                        </p>
                        <p class="text-sm md:text-lg text-black text-center font-bold">
                            {{ $TotalSuratMasuk }}
                        </p>
                    </div>
                    <div class="h-full w-full border-r-2 border-black dark:border-white bg-red-300">
                        <p class="text-sm md:text-lg text-black text-center font-bold mt-16">
                            Jumlah Surat Keluar
                        </p>
                        <p class="text-sm md:text-lg text-black text-center font-bold">
                            x
                        </p>
                    </div>
                    <div class="h-full w-full border-r-2 border-black dark:border-white bg-blue-300">
                        <p class="text-sm md:text-lg text-black text-center font-bold mt-16">
                            Jumlah Disposisi
                        </p>
                        <p class="text-sm md:text-lg text-black text-center font-bold">
                            x
                        </p>
                    </div>
                    <div class="h-full w-full bg-lime-400">
                        <p class="text-sm md:text-lg text-black text-center font-bold mt-16">
                            Jumlah Pengguna
                        </p>
                        <p class="text-sm md:text-lg text-black text-center font-bold">
                            {{ Auth::user()->count() }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
