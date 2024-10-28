<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Form') }}
        </h2>
    </x-slot>
    <div class="mt-3 ml-5">
        <a href="{{ route('suratkeluar') }}"
            class="px-3 py-1 bg-orange-400 rounded-3xl font-semibold hover:bg-orange-700 hover:font-bold hover:text-white">
            Back
        </a>
    </div>
    <div class="py-1 px-20">
        <p class="text-center text-2xl font-bold mb-5">
            Tambah Surat Keluar
        </p>
        <form action="{{ route('Tambahkan-Surat-Keluar') }}" method="POST" enctype="multipart/form-data"
            autocomplete="off">
            @csrf
            <div class="relative z-0 w-full mb-5 group">
                <input type="text" name="tujuanSuratKeluar" id="tujuanSuratKeluar"
                    class="block py-2.5 px-0 w-full text-sm text-black bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                    placeholder=" " required />
                <label for="tujuanSuratKeluar"
                    class="peer-focus:font-medium absolute text-sm text-black dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Tujuan
                    Surat Keluar</label>
                @error('tujuanSuratKeluar')
                    <div>{{ $message }}</div>
                @enderror
            </div>
            <div class="relative z-0 w-full mb-5 group">
                <input type="text" name="noSurat" id="noSurat"
                    class="block py-2.5 px-0 w-full text-sm text-black bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                    placeholder=" " required />
                <label for="noSurat"
                    class="peer-focus:font-medium absolute text-sm text-black dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Nomor
                    Surat Keluar</label>
            </div>
            <div class="relative z-0 w-full mb-5 group">
                <input type="text" name="perihal" id="perihal"
                    class="block py-2.5 px-0 w-full text-sm text-black bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                    placeholder=" " required />
                <label for="perihal"
                    class="peer-focus:font-medium absolute text-sm text-black dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Perihal
                    Surat Keluar</label>
            </div>
            <div class="relative z-0 w-full mb-5 group">
                <textarea type="text" name="isiRingkas" id="isiRingkas"
                    class="block py-2.5 px-0 h-12 w-full text-sm text-black bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                    placeholder=" " required></textarea>
                <label for="isiRingkas"
                    class="peer-focus:font-medium absolute text-sm text-black dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Isi
                    Ringkas Surat Keluar</label>
            </div>
            <div class="relative z-0 w-full mb-5 group">
                <input type="date" name="tglSuratKeluar" id="tglSuratKeluar"
                    class="block py-2.5 px-0 w-full text-sm text-black bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                    placeholder=" " required />
                <label for="tglSuratKeluar"
                    class="peer-focus:font-medium absolute text-sm text-black dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Tanggal
                    Surat Keluar</label>
            </div>
            <div class="relative z-0 w-full mb-5 group">
                <input type="file" name="fileSuratKeluar" id="fileSuratKeluar" accept=".pdf"
                    class="block py-2.5 px-0 w-full text-sm text-black bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                    placeholder=" " required />
                <label for="fileSuratKeluar"
                    class="peer-focus:font-medium absolute text-sm text-black dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">File
                    Surat Keluar</label>
            </div>
            <div>
                <button type="submit"
                    class="bg-lime-500 px-3 h-8 rounded-lg text-white font-semibold drop-shadow hover:bg-lime-800">Simpan
                    Data</button>
                <button type="reset"
                    class="bg-red-500 px-3 h-8 rounded-lg  text-white font-semibold drop-shadow hover:bg-red-800">Reset</button>
            </div>
        </form>
    </div>
</x-app-layout>
