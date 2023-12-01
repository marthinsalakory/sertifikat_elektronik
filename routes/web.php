<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Auth::routes();

Route::middleware('auth')->group(function () {
    Route::get('/', [App\Http\Controllers\DasborController::class, 'index'])->name('dasbor');

    Route::name('sertifikat')->prefix('sertifikat')->group(function () {
        Route::get('/', [App\Http\Controllers\SertifikatController::class, 'index'])->name('.index');
        Route::get('/data', [App\Http\Controllers\SertifikatController::class, 'data'])->name('.data');
        Route::post('/data', [App\Http\Controllers\SertifikatController::class, 'post'])->name('.post');
        Route::get('/simpan/{nama?}', [App\Http\Controllers\SertifikatController::class, 'simpan'])->name('.simpan');
        Route::get('/hapus/{id}', [App\Http\Controllers\SertifikatController::class, 'hapus'])->name('.hapus');
        Route::get('/lihat/{id}', [App\Http\Controllers\SertifikatController::class, 'lihat'])->name('.lihat');
    });

    Route::name('pengguna')->prefix('pengguna')->group(function () {
        Route::get('/', [App\Http\Controllers\PenggunaController::class, 'index'])->name('.index');
        Route::get('/tambah/{id?}', [App\Http\Controllers\PenggunaController::class, 'tambah'])->name('.tambah');
        Route::post('/tambah/{id?}', [App\Http\Controllers\PenggunaController::class, 'simpan']);
        Route::get('/hapus/{id}', [App\Http\Controllers\PenggunaController::class, 'hapus'])->name('.hapus');
    });
});
