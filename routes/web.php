<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\NilaiController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\KepsekController;
use App\Http\Controllers\MapelController;

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/home', [AuthController::class, 'home']) ->name('dasboard.home');



// Public routes

    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/postlogin', [AuthController::class, 'login']);
    Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);

// Authenticated routes

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    
    // Route::get('/dashboard', function () {
    //     return view('guru.index');
    // })->name('dashboard');

    Route::get('/guru', [GuruController::class, 'index'])->name('guru.index');
    Route::post('/guru', [GuruController::class, 'store'])->name('guru.store');
    Route::put('/guru/{guru}', [GuruController::class, 'update'])->name('guru.update');
    Route::delete('/guru/{guru}', [GuruController::class, 'destroy'])->name('guru.destroy');
    Route::get('/guru/export', [GuruController::class, 'export'])->name('guru.export')->middleware('auth');


    Route::get('/siswa', [SiswaController::class, 'index'])->name('siswa.index');
    Route::post('/siswa', [SiswaController::class, 'store'])->name('siswa.store');
Route::get('/siswa/profile/{id}', [SiswaController::class, 'profile'])->name('siswa.profile');
    Route::put('/siswa/{siswa}', [SiswaController::class, 'update'])->name('siswa.update');
    Route::delete('/siswa/{siswa}', [SiswaController::class, 'destroy'])->name('siswa.destroy');
    // CSV import routes
    Route::post('siswa/import-csv', [SiswaController::class, 'importCSV'])->name('siswa.import-csv');
    Route::get('siswa/export-csv-template', [SiswaController::class, 'exportCSVTemplate'])->name('siswa.export-csv-template');

    
    Route::get('/nilai', [NilaiController::class, 'index'])->name('penilaian.nilai');
    Route::get('/nilai/create', [NilaiController::class, 'create'])->name('nilai.create');
    Route::post('/nilai', [NilaiController::class, 'store'])->name('nilai.store');
    Route::get('/nilai/{id}/edit', [NilaiController::class, 'edit'])->name('penilaian.nilaiedit');
    Route::put('/nilai/{id}', [NilaiController::class, 'update']);
    Route::delete('/nilai/{nilai}', [NilaiController::class, 'destroy'])->name('penilaian.destroy');
    Route::get('/nilai/export', [NilaiController::class, 'exportExcel'])->name('penilaian.export');


    Route::get('/kelas', [KelasController::class, 'index'])->name('penilaian.kelas');
    Route::post('/kelas', [KelasController::class, 'store'])->name('kelas.store');
    Route::get('/kelas/{kelas}/edit', [KelasController::class, 'edit'])->name('penilaian.kelasedit');
    Route::put('/kelas/{kelas}', [KelasController::class, 'update'])->name('kelas.update');
    Route::delete('/kelas/{kelas}', [KelasController::class, 'destroy'])->name('kelas.destroy');


    Route::get('/mapel/store', [MapelController::class, 'store'])->name('mapel.store');
    Route::get('/mapel', [MapelController::class, 'index'])->name('penilaian.mapel');
    Route::get('/mapel/{id}/edit', [MapelController::class, 'edit'])->name('mapel.edit');
    Route::put('/mapel/{id}', [MapelController::class, 'update'])->name('mapel.update');
    Route::delete('/mapel/{id}', [MapelController::class, 'destroy'])->name('mapel.destroy');


Route::get('/kepsek', [KepsekController::class, 'index'])->name('kepsek.index');
Route::post('/kepsek', [KepsekController::class, 'store'])->name('kepsek.store');
Route::put('/kepsek/{id}', [KepsekController::class, 'update'])->name('kepsek.update');
Route::delete('/kepsek/{user}', [KepsekController::class, 'destroy'])->name('kepsek.destroy');
