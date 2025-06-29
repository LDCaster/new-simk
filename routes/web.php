<?php

use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CutiController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\KontrakKerjaController;
use App\Http\Controllers\LaporanStatistikController;
use App\Http\Controllers\PelatihanController;
use App\Http\Controllers\ResignController;
use App\Http\Controllers\TrainPlanController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;

// Auth Routes
Route::get('/', [AuthController::class, 'login']);
Route::get('/login', [AuthController::class, 'login'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'authenticate']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Dashboard
Route::get('/dashboard', [DashboardController::class, 'index']);

// Karyawan
Route::prefix('karyawan')->name('karyawan.')->group(function () {
    Route::get('/', [KaryawanController::class, 'index'])->name('index');
    Route::get('/create', [KaryawanController::class, 'create'])->name('create');
    Route::post('/store', [KaryawanController::class, 'store'])->name('store');
    Route::get('/{id}', [KaryawanController::class, 'show'])->name('show');
    Route::get('/{id}/edit', [KaryawanController::class, 'edit'])->name('edit');
    Route::put('/{id}', [KaryawanController::class, 'update'])->name('update');
    Route::delete('/{id}', [KaryawanController::class, 'destroy'])->name('destroy');
});

// Kontrak Kerja
Route::prefix('kontrak-kerja')->name('kontrak-kerja.')->group(function () {
    Route::get('/', [KontrakKerjaController::class, 'index'])->name('index');
    Route::put('/update/{id}', [KontrakKerjaController::class, 'update'])->name('update');
    Route::delete('/{id}', [KontrakKerjaController::class, 'destroy'])->name('destroy');
});

// Data Resign
Route::prefix('data-resign')->name('data-resign.')->group(function () {
    Route::get('/', [ResignController::class, 'index'])->name('index');
    Route::post('/', [ResignController::class, 'store'])->name('store');
    Route::put('/update/{id}', [ResignController::class, 'update'])->name('update');
    Route::delete('/{id}', [ResignController::class, 'destroy'])->name('destroy');
});

// Data Pelatihan
Route::prefix('data-pelatihan')->name('data-pelatihan.')->group(function () {
    Route::get('/', [PelatihanController::class, 'index'])->name('index');
    Route::post('/', [PelatihanController::class, 'store'])->name('store');
    // Hapus 1 pelatihan
    Route::delete('/{id}', [PelatihanController::class, 'destroy'])->name('destroy');
    // Hapus semua pelatihan 1 karyawan
    Route::delete('/karyawan/{id}', [PelatihanController::class, 'destroyByKaryawan'])->name('destroyByKaryawan');
});
// Get history
Route::get('/pelatihan/history/{karyawan_id}', [PelatihanController::class, 'getHistoryPelatihan'])->name('pelatihan.history');

// Absensi
Route::prefix('absensi')->name('absensi.')->group(function () {
    Route::get('/', [AbsensiController::class, 'index'])->name('index');
    Route::post('/bulk-update', [AbsensiController::class, 'bulkUpdate'])->name('bulk-update');
});

// Cuti
Route::prefix('cuti')->name('cuti.')->group(function () {
    Route::get('/', [CutiController::class, 'index'])->name('index');
    Route::get('/create', [CutiController::class, 'create'])->name('create');
    Route::post('/store', [CutiController::class, 'store'])->name('store');
    Route::post('/{id}/status', [CutiController::class, 'updateStatus'])->name('updateStatus');
    Route::delete('/{id}', [CutiController::class, 'destroy'])->name('destroy');
});

// Training Plans
Route::prefix('training-plans')->name('training-plans.')->group(function () {
    Route::get('/', [TrainPlanController::class, 'index'])->name('index');
    Route::get('/create', [TrainPlanController::class, 'create'])->name('create');
    Route::post('/store', [TrainPlanController::class, 'store'])->name('store');
    Route::get('/{id}/edit', [TrainPlanController::class, 'edit'])->name('edit');
    Route::put('/{id}', [TrainPlanController::class, 'update'])->name('update');
    Route::delete('/{id}', [TrainPlanController::class, 'destroy'])->name('destroy');
});

Route::prefix('users')->name('users.')->group(function () {
    Route::get('/', [UsersController::class, 'index'])->name('index');
    Route::get('/{id}/edit', [UsersController::class, 'edit'])->name('edit');
    Route::put('/{id}', [UsersController::class, 'update'])->name('update');
});

// Laporan Statistik
Route::get('/laporan-statisik', [LaporanStatistikController::class, 'index'])->name('laporan-statistik.index');
