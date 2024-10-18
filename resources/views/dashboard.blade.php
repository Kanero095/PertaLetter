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
                    <img src="{{ asset('Image/Logo/Logo_Pertamina.png') }}" alt=""
                        class="size-20 w-96 mx-auto my-2">
                    <p class="text-center mx-auto mt-3 w-3/4">
                        Alamat : jalan
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
                    <h1 class="text-3xl mb-2">
                        Selamat Datang <span class="font-bold">{{ Auth::user()->name }}</span>
                    </h1>
                    @if (Auth::user()->roles == 'Super Admin')
                        <p>
                            Anda login sebagai <span class="font-bold">{{ Auth::user()->roles }}</span>, Anda memiliki
                            akses secara keseluruhan.
                        </p>
                    @else
                        Anda login sebagai <span class="font-bold">{{ Auth::user()->roles }}</span>, Anda memiliki akses
                        Menambah dan Mengedit.
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div class="mt-3">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                {{-- content --}}
                <div class="grid grid-cols-4 justify-center h-48 rounded">
                    <div class="h-full item-center w-full border-r-2 border-black dark:border-white bg-orange-400">
                        <p class="text-sm md:text-lg text-black text-center font-bold mt-16">
                            Jumlah Surat Masuk
                        </p>
                        <p class="text-sm md:text-lg text-black text-center font-bold">
                            1
                        </p>
                    </div>
                    <div class="h-full w-full border-r-2 border-black dark:border-white bg-red-300">
                        <p class="text-sm md:text-lg text-black text-center font-bold mt-16">
                            Jumlah Surat Keluar
                        </p>
                        <p class="text-sm md:text-lg text-black text-center font-bold">
                            1
                        </p>
                    </div>
                    <div class="h-full w-full border-r-2 border-black dark:border-white bg-blue-300">
                        <p class="text-sm md:text-lg text-black text-center font-bold mt-16">
                            Jumlah Disposisi
                        </p>
                        <p class="text-sm md:text-lg text-black text-center font-bold">
                            1
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
