<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\LoginController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\AbsenController;
use App\Http\Controllers\LemburController;
use App\Http\Controllers\KalkulasiGajiController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/dashboard', function () {
    return view('admin.index');
})->middleware('auth');

Route::get('/karyawan', [KaryawanController::class, 'index'])->middleware('auth');
Route::get('/karyawan/create', [KaryawanController::class, 'create'])->middleware('auth');
Route::post('/karyawan', [KaryawanController::class, 'store'])->name('karyawan.store')->middleware('auth');
Route::get('/karyawan/{id}/edit', [KaryawanController::class, 'edit'])->middleware('auth');
Route::put('/karyawan/{id}', [KaryawanController::class, 'update'])->name('karyawan.update')->middleware('auth');
Route::delete('/karyawan/{id}', [KaryawanController::class, 'destroy'])->name('karyawan.destroy')->middleware('auth');

Route::get('/gaji', [KaryawanController::class, 'gaji'])->middleware('auth');
Route::get('/gaji/{id}/edit', [KaryawanController::class, 'editgaji'])->middleware('auth');
Route::put('/gaji/{id}', [KaryawanController::class, 'updategaji'])->name('gaji.update')->middleware('auth');

Route::get('/gaji/kalkulasi', [KalkulasiGajiController::class, 'index'])->middleware('auth');
Route::post('/gaji/kalkulasigaji', [KalkulasiGajiController::class, 'kalkulasiGaji'])->name('kalkulasi')->middleware('auth');

Route::get('/gaji/detail_gaji', [KalkulasiGajiController::class, 'detailGaji'])->middleware('auth');
Route::post('/gaji/pdf', [KalkulasiGajiController::class, 'pdf'])->name('pdf')->middleware('auth');


Route::get('/spv/pengesahan', [KalkulasiGajiController::class, 'pengesahan'])->middleware('auth');
Route::post('/spv/pengesahan/aksi', [KalkulasiGajiController::class, 'aksi_pengesahan'])->name('pengesahan')->middleware('auth');
Route::post('/spv/pengesahan/batal', [KalkulasiGajiController::class, 'batal_pengesahan'])->name('batalkan.pengesahan')->middleware('auth');

Route::get('/spv/batalkan_pengesahan', [KalkulasiGajiController::class, 'batalkan_pengesahan'])->middleware('auth');

Route::get('/spv/pdf', [KalkulasiGajiController::class, 'spv'])->middleware('auth');

Route::get('/absensi', [AbsenController::class, 'absenapi'])->middleware('auth');

Route::get('/absensi/cuti', [AbsenController::class, 'index'])->middleware('auth');
Route::get('/absensi/cuti/{id}/edit', [AbsenController::class, 'edit'])->middleware('auth');
Route::put('/absensi/cuti/{id}', [AbsenController::class, 'update'])->name('absen.update')->middleware('auth');
Route::delete('/absensi/cuti/{id}', [AbsenController::class, 'destroy'])->name('cuti.destroy')->middleware('auth');

Route::get('/absensi/lembur', [LemburController::class, 'index'])->middleware('auth');
Route::get('/absensi/lembur/create', [LemburController::class, 'create'])->middleware('auth');
Route::post('/absensi/lembur', [LemburController::class, 'store'])->name('lembur.store')->middleware('auth');
Route::get('/absensi/lembur/{id}/edit', [LemburController::class, 'edit'])->middleware('auth');
Route::put('/absensi/lembur/{id}', [LemburController::class, 'update'])->name('lembur.update')->middleware('auth');
Route::delete('/absensi/lembur/{id}', [LemburController::class, 'destroy'])->name('lembur.destroy')->middleware('auth');
// Route::get('/admin', [DashboardController::class, 'index'])->middleware('auth');

// Route::get('/admin', function () {
//     return view('admin.index');
// });
