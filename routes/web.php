<?php

use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CutiController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\KontrakKerjaController;
use App\Http\Controllers\PelatihanController;
use App\Http\Controllers\ResignController;
use App\Http\Controllers\TrainPlanController;
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
Route::post('/absensi/bulk-update', [AbsensiController::class, 'bulkUpdate'])->name('absensi.bulk-update');

Route::get('/cuti', [CutiController::class, 'index'])->name('cuti.index');
Route::get('/cuti/create', [CutiController::class, 'create'])->name('cuti.create');
Route::post('/cuti/store', [CutiController::class, 'store'])->name('cuti.store');
Route::post('/cuti/{id}/status', [CutiController::class, 'updateStatus'])->name('cuti.updateStatus');
Route::delete('cuti/{id}', [CutiController::class, 'destroy'])->name('cuti.destroy');

Route::get('training-plans', [TrainPlanController::class, 'index'])->name('training-plans.index');
Route::get('training-plans/create', [TrainPlanController::class, 'create'])->name('training-plans.create');
Route::post('training-plans/store', [TrainPlanController::class, 'store'])->name('training-plans.store');
Route::get('/training-plans/{id}/edit', [TrainPlanController::class, 'edit'])->name('training-plans.edit');
Route::put('/training-plans/{id}', [TrainPlanController::class, 'update'])->name('training-plans.update');
Route::delete('/training-plans/{id}', [TrainPlanController::class, 'destroy'])->name('training-plans.destroy');
