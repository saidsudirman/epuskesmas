<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PengunjungController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\InformasiController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ArtikelController;


Route::get('/', [PengunjungController::class, 'index']);


Route::get('/pendaftaran', [PengunjungController::class, 'create'])->name('pengunjung.create');
Route::post('/pendaftaran', [PengunjungController::class, 'store'])->name('pengunjung.store');

Route::get('/about', [PengunjungController::class, 'about']);
Route::get('/service', [PengunjungController::class, 'service']);
Route::get('/dokter', [PengunjungController::class, 'dokter']);
Route::get('/contact', [PengunjungController::class, 'contact']);

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::prefix('admin')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('admin.index');
        Route::get('/create', [UserController::class, 'create'])->name('admin.create');
        Route::post('/', [UserController::class, 'store'])->name('admin.store');
        Route::get('/{id}/edit', [UserController::class, 'edit'])->name('admin.edit');
        Route::put('/{id}', [UserController::class, 'update'])->name('admin.update');
        Route::delete('/{id}', [UserController::class, 'destroy'])->name('admin.destroy');

        Route::get('/informasi', [InformasiController::class, 'index'])->name('informasi.index');
        Route::get('/informasi/create', [InformasiController::class, 'create'])->name('informasi.create');
        Route::post('/informasi', [InformasiController::class, 'store'])->name('informasi.store');
        Route::get('/informasi/{id}/edit', [InformasiController::class, 'edit'])->name('informasi.edit');
        Route::put('/informasi/{id}', [InformasiController::class, 'update'])->name('informasi.update');
        Route::delete('/informasi/{id}', [InformasiController::class, 'destroy'])->name('informasi.destroy');

        Route::get('/artikel', [ArtikelController::class, 'index'])->name('artikel.index');
        Route::get('/artikel/create', [ArtikelController::class, 'create'])->name('artikel.create');
        Route::post('/artikel', [ArtikelController::class, 'store'])->name('artikel.store');
        Route::get('/artikel/{id}/edit', [ArtikelController::class, 'edit'])->name('artikel.edit');
        Route::put('/artikel/{id}', [ArtikelController::class, 'update'])->name('artikel.update');
        Route::delete('/artikel/{id}', [ArtikelController::class, 'destroy'])->name('artikel.destroy');

        // Route::get('/laporan', [AdminController::class, 'laporan'])->name('admin.laporan');
        // Route::get('/laporan/{tgl_kunjung}', [AdminController::class, 'tgldetail'])->name('admin.tgldetail');
        // Route::get('/poli', [AdminController::class, 'poliindex'])->name('poli.index');
        // Route::get('/user', [AdminController::class, 'userindex'])->name('user.index');
    });
});
