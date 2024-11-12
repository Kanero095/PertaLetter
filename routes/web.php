<?php

use App\Http\Controllers\DefaultController;
use App\Http\Controllers\DisposisiController;
use App\Http\Controllers\SuratDitolakController;
use App\Http\Controllers\SuratKeluarController;
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

    Route::get('/tambah/surat-keluar',[SuratKeluarController::class, 'TambahSuratKeluar'])->name('Tambah-Surat-Keluar');
    Route::post('/tambah/surat-keluar',[SuratKeluarController::class, 'SuratKeluar'])->name('Tambahkan-Surat-Keluar');
    Route::post('/surat-keluar/{slug}',[SuratKeluarController::class, 'DeleteSuratKeluar'])->name('DeleteSuratKeluar');
    Route::get('/surat-keluar/edit/{slug}/',[SuratKeluarController::class, 'editSuratKeluar'])->name('EditSuratKeluar');
    Route::get('/suratkeluar/pdf/{slug}', [SuratKeluarController::class, 'showPDFKeluar'])->name('pdf.showKeluar');
    Route::post('/surat-keluar/edit/{slug}/',[SuratKeluarController::class, 'updateSuratKeluar'])->name('updateSuratKeluar');
    Route::get('/surat-keluar/view/{slug}', [SuratKeluarController::class,'viewSuratKeluar'])->name('viewSuratKeluar');

    Route::get('/surat-disposisi', [DefaultController::class,'suratdisposisi'])->name('suratdisposisi');
    Route::get('/tambah/surat-disposisi', [DisposisiController::class, 'tambah'])->name('tambah');
    Route::post('/tambah/surat-disposisi', [DisposisiController::class, 'generate'])->name('generate-disposisi');
    Route::get('/suratdisposisi/pdf/{slug}', [DisposisiController::class, 'disposisi'])->name('pdf.showDisposisi');
    Route::get('/surat-disposisi/view/{slug}',[DisposisiController::class, 'viewDisposisi'])->name('viewSuratDisposisi');

    Route::get('/surat-ditolak', [DefaultController::class, 'suratditolak'])->name('suratditolak');
    Route::get('/tambah/surat-ditolak',[SuratDitolakController::class, 'TambahSuratDitolak'])->name('tambah-surat-ditolak');
    Route::post('tambah/surat-ditolak', [SuratDitolakController::class, 'tambahkanSuratDitolak'])->name('tambahkan-surat-ditolak');
    Route::post('/surat-ditolak/{slug}', [SuratDitolakController::class, 'DeleteSuratDitolak'])->name('DeleteSuratDitolak');
    Route::get('surat-ditolak/pdf/{slug}', [SuratDitolakController::class, 'showPDFDitolak'])->name('pdf.ShowDitolak');
    Route::get('/surat-ditolak/view/{slug}', [SuratDitolakController::class, 'ViewSuratDitolak'])->name('ViewSuratDitolak');
    Route::get('/surat-ditolak/edit/{slug}', [SuratDitolakController::class, 'EditSuratDitolak'])->name('EditSuraDitolak');
    Route::post('/surat-ditolak/edit/{slug}', [SuratDitolakController::class, 'updateSuratDitolak'])->name('UpdateSuraDitolak');
});
