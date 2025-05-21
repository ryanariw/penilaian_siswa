<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\NilaiController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\KepsekController;
use App\Http\Controllers\MapelController;

// Halaman utama
Route::get('/', fn() => view('auth.login'));

// Auth (login & register)
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/postlogin', [AuthController::class, 'login']);
    Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
});

// Logout (hanya bisa jika sudah login)
Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

// Dashboard
Route::get('/home', [AuthController::class, 'home'])->name('dasboard.home')->middleware('auth');

// Route yang hanya bisa diakses jika sudah login
Route::middleware('auth')->group(function () {

    // GURU
    Route::prefix('guru')->name('guru.')->group(function () {
        Route::get('/', [GuruController::class, 'index'])->name('index');
        Route::post('/', [GuruController::class, 'store'])->name('store');
        Route::put('/{guru}', [GuruController::class, 'update'])->name('update');
        Route::delete('/{guru}', [GuruController::class, 'destroy'])->name('destroy');
        Route::get('/export', [GuruController::class, 'export'])->name('export');
    });

    // SISWA
    Route::prefix('siswa')->name('siswa.')->group(function () {
        Route::get('/', [SiswaController::class, 'index'])->name('index');
        Route::post('/', [SiswaController::class, 'store'])->name('store');
        Route::get('/profile/{id}', [SiswaController::class, 'profile'])->name('profile');
        Route::put('/{siswa}', [SiswaController::class, 'update'])->name('update');
        Route::delete('/{siswa}', [SiswaController::class, 'destroy'])->name('destroy');
        Route::post('/import-csv', [SiswaController::class, 'importCSV'])->name('import-csv');
        Route::get('/export-csv-template', [SiswaController::class, 'exportCSVTemplate'])->name('export-csv-template');
    });

   Route::prefix('penilaian')->name('penilaian.')->group(function () {
    // NILAI
    Route::get('/nilai', [NilaiController::class, 'index'])->name('nilai');
    Route::get('/nilai/create', [NilaiController::class, 'create'])->name('nilaicreate');
    Route::post('/nilai', [NilaiController::class, 'store'])->name('nilaistore');
    Route::get('/nilai/{id}/edit', [NilaiController::class, 'edit'])->name('nilaiedit');
    Route::put('/nilai/{id}', [NilaiController::class, 'update'])->name('nilaiupdate');
    Route::delete('/nilai/{id}', [NilaiController::class, 'destroy'])->name('destroy');
    Route::get('/nilai/export', [NilaiController::class, 'exportExcel'])->name('export');
    // KELAS
    Route::get('/kelas', [KelasController::class, 'index'])->name('kelas.index');
    Route::post('/kelas', [KelasController::class, 'store'])->name('kelas.store');
    Route::get('/kelas/{id}/edit', [KelasController::class, 'edit'])->name('kelas.edit');
    Route::put('/kelas/{id}', [KelasController::class, 'update'])->name('kelas.update');
    Route::delete('/kelas/{id}', [KelasController::class, 'destroy'])->name('kelas.destroy');

    // MAPEL
    Route::delete('mapel/{id}', [MapelController::class, 'destroy'])->name('mapeldestroy');
    Route::post('mapel', [MapelController::class, 'store'])->name('mapelstore');
    Route::put('mapel/{id}', [MapelController::class, 'update'])->name('mapelupdate');
    Route::get('mapel', [MapelController::class, 'index'])->name('mapel');
});
 // KEPSEK
    Route::prefix('kepsek')->name('kepsek.')->group(function () {
        Route::get('/', [KepsekController::class, 'index'])->name('index');
        Route::post('/', [KepsekController::class, 'store'])->name('store');
        Route::put('/{id}', [KepsekController::class, 'update'])->name('update');
        Route::delete('/{user}', [KepsekController::class, 'destroy'])->name('destroy');
    });



});

   
