<?php

use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\KontrakKerjaController;
use App\Http\Controllers\PelatihanController;
use App\Http\Controllers\ResignController;
use Illuminate\Support\Facades\Route;

Route::get('/', [AuthController::class, 'login']);
Route::get('/login', [AuthController::class, 'login'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'authenticate']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/dashboard', [DashboardController::class, 'index']);

Route::get('/karyawan', [KaryawanController::class, 'index'])->name('karyawan.index');
Route::get('/karyawan/create', [KaryawanController::class, 'create'])->name('karyawan.create');
Route::post('/karyawan/store', [KaryawanController::class, 'store'])->name('karyawan.store');
Route::get('/karyawan/{id}/edit', [KaryawanController::class, 'edit'])->name('karyawan.edit');
Route::put('/karyawan/{id}', [KaryawanController::class, 'update'])->name('karyawan.update');
Route::delete('/karyawan/{id}', [KaryawanController::class, 'destroy'])->name('karyawan.destroy');

Route::get('/kontrak-kerja', [KontrakKerjaController::class, 'index'])->name('kontrak-kerja.index');
Route::put('/kontrak-kerja/update/{id}', [KontrakKerjaController::class, 'update'])->name('kontrak-kerja.update');
Route::delete('/kontrak-kerja/{id}', [KontrakKerjaController::class, 'destroy'])->name('kontrak-kerja.destroy');

Route::get('/data-resign', [ResignController::class, 'index'])->name('data-resign.index');
Route::post('/data-resign', [ResignController::class, 'store'])->name('data-resign.store');
Route::put('/data-resign/update/{id}', [ResignController::class, 'update'])->name('data-resign.update');
Route::delete('/data-resign/{id}', [ResignController::class, 'destroy'])->name('data-resign.destroy');

Route::get('/data-pelatihan', [PelatihanController::class, 'index'])->name('data-pelatihan.index');
Route::post('/data-pelatihan', [PelatihanController::class, 'store'])->name('data-pelatihan.store');
Route::get('/pelatihan/history/{karyawan_id}', [PelatihanController::class, 'getHistoryPelatihan'])->name('pelatihan.history');
Route::delete('/data-pelatihan/{id}', [PelatihanController::class, 'destroy'])->name('data-pelatihan.destroy');

Route::get('/absensi', [AbsensiController::class, 'index'])->name('absensi.index');
