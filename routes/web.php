<?php

use App\Http\Controllers\DefaultController;
use App\Http\Controllers\SuratMasukController;
use Illuminate\Support\Facades\Route;

Route::redirect('/home', '/dashboard');
Route::redirect('/','/login');
Route::redirect('/register','');

Route::fallback(function () {
    return "404 Page Not Found";
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', [DefaultController::class,'dashboard'])->name('dashboard');
    Route::get('/surat-masuk', [DefaultController::class,'suratmasuk'])->name('suratmasuk');
    Route::post('/surat-masuk/{slug}',[SuratMasukController::class, 'DeleteSuratMasuk'])->name('DeleteSuratMasuk');

    Route::get('/surat-masuk/edit/{slug}/',[SuratMasukController::class, 'editSuratMasuk'])->name('EditSuratMasuk');
    Route::post('/surat-masuk/edit/{slug}/',[SuratMasukController::class, 'updateSuratMasuk'])->name('updateSuratMasuk');
    Route::get('/suratmasuk/pdf/{slug}', [SuratMasukController::class, 'showPDF'])->name('pdf.show');

    Route::get('/surat-masuk/view/{slug}', [SuratMasukController::class,'viewSuratMasuk'])->name('viewSuratMasuk');

    Route::get('/surat-keluar', [DefaultController::class,'suratkeluar'])->name('suratkeluar');

    Route::get('/tambah/surat-masuk',[SuratMasukController::class, 'TambahsuratMasuk'])->name('Tambah-Surat-Masuk');
    Route::post('/tambah/surat-masuk',[SuratMasukController::class, 'SuratMasuk'])->name('Tambahkan-Surat-Masuk');
});
