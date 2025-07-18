<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PengunjungController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DokterController;
use App\Http\Controllers\InformasiController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\Users1LoginController;
use App\Http\Controllers\PelayananController;
use App\Http\Controllers\RegisterController;

// Halaman utama
Route::get('/', [PengunjungController::class, 'index'])->name('beranda');

// Halaman pendaftaran
Route::get('/pendaftaran', [PengunjungController::class, 'create'])->name('pengunjung.create');
Route::post('/pendaftaran', [PengunjungController::class, 'store'])->name('pengunjung.store');

// Halaman layanan
Route::get('/layanan', [PengunjungController::class, 'service'])->name('layanan');

// Artikel
Route::get('/artikel', [PengunjungController::class, 'tampilkanArtikel'])->name('artikel');
Route::get('/artikel/{id}', [PengunjungController::class, 'detailArtikel'])->name('artikel.detail');

// Dokter
Route::get('/dokter', [PengunjungController::class, 'tampilkanDokter'])->name('dokter');

Route::middleware('auth')->group(function () {
Route::get('/dokter/{id}/detail', [PengunjungController::class, 'detailDokter'])
    ->middleware('auth:users1')
    ->name('dokter.detail');
});

Route::get('/service', [PengunjungController::class, 'service']);

// Halaman tambahan
Route::get('/about', [PengunjungController::class, 'about'])->name('about');
Route::get('/contact', [PengunjungController::class, 'contact'])->name('contact');

// Login
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/user/login', [Users1LoginController::class, 'userindex'])->name('userlogin');
Route::post('/user/login', [Users1LoginController::class, 'userlogin'])->name('userlogin.post');
Route::get('/user/logout', [Users1LoginController::class, 'userlogout'])->name('userlogout');

Route::middleware(['auth'])->group(function () {
    
    Route::prefix('admin')->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
        Route::get('/admin', [UserController::class, 'index'])->name('admin.index');
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


        Route::get('/dokter', [DokterController::class, 'index'])->name('dokter.index');
        Route::get('/dokter/create', [DokterController::class, 'create'])->name('dokter.create');
        Route::post('/dokter', [DokterController::class, 'store'])->name('dokter.store');
        Route::get('/dokter/{id}/edit', [DokterController::class, 'edit'])->name('dokter.edit');
        Route::put('/dokter/{id}', [DokterController::class, 'update'])->name('dokter.update');
        Route::delete('/dokter/{id}', [DokterController::class, 'destroy'])->name('dokter.destroy');

        Route::get('/pelayanan', [PelayananController::class, 'index'])->name('pelayanan.index');
        Route::get('/pelayanan/create', [PelayananController::class, 'create'])->name('pelayanan.create');
        Route::post('/pelayanan', [PelayananController::class, 'store'])->name('pelayanan.store');
        Route::get('/pelayanan/{id}/edit', [PelayananController::class, 'edit'])->name('pelayanan.edit');
        Route::put('/pelayanan/{id}', [PelayananController::class, 'update'])->name('pelayanan.update');
        Route::delete('/pelayanan/{id}', [PelayananController::class, 'destroy'])->name('pelayanan.destroy');

        // Route::get('/laporan', [AdminController::class, 'laporan'])->name('admin.laporan');
        // Route::get('/laporan/{tgl_kunjung}', [AdminController::class, 'tgldetail'])->name('admin.tgldetail');
        // Route::get('/poli', [AdminController::class, 'poliindex'])->name('poli.index');
        // Route::get('/user', [AdminController::class, 'userindex'])->name('user.index');
    });
});
