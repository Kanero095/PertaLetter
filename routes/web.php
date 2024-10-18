<?php

use App\Http\Controllers\DefaultController;
use Illuminate\Support\Facades\Route;

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
    Route::get('/surat-keluar', [DefaultController::class,'suratkeluar'])->name('suratkeluar');
});
