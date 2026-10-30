<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PengajuanController;
use App\Http\Controllers\PersetujuanController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\PengaturanController;

Route::get('/', function () {
    return redirect()->route('dashboard');
});

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware('auth')
    ->name('dashboard');

require __DIR__.'/auth.php';

Route::middleware('auth')->group(function () {

    // Pengajuan dokumen
    Route::get('/pengajuan', [PengajuanController::class, 'index'])
        ->name('pengajuan.index');

    Route::get('/pengajuan/create', [PengajuanController::class, 'create'])
        ->name('pengajuan.create');

    Route::post('/pengajuan', [PengajuanController::class, 'store'])
        ->name('pengajuan.store');

    // Persetujuan dokumen
    Route::get('/persetujuan', [PersetujuanController::class, 'index'])
        ->middleware('role:atasan')
        ->name('persetujuan.index');

    Route::patch('/persetujuan/{pengajuan}', [PersetujuanController::class, 'update'])
        ->middleware('role:atasan')
        ->name('persetujuan.update');

// Pengguna - khusus Admin Aplikasi
Route::get('/pengguna', [PenggunaController::class, 'index'])
    ->middleware('role:admin_aplikasi')
    ->name('pengguna.index');

Route::post('/pengguna', [PenggunaController::class, 'store'])
    ->middleware('role:admin_aplikasi')
    ->name('pengguna.store');

Route::patch('/pengguna/{user}/role', [PenggunaController::class, 'updateRole'])
    ->middleware('role:admin_aplikasi')
    ->name('pengguna.updateRole');

Route::delete('/pengguna/{user}', [PenggunaController::class, 'destroy'])
    ->middleware('role:admin_aplikasi')
    ->name('pengguna.destroy');

    // Laporan - khusus Admin Aplikasi
    Route::get('/laporan', [LaporanController::class, 'index'])
    ->middleware('role:admin_aplikasi')
    ->name('laporan.index');

   // Pengaturan - khusus Admin Aplikasi
    Route::get('/pengaturan', [PengaturanController::class, 'index'])
    ->middleware('role:admin_aplikasi')
    ->name('pengaturan.index');

    Route::put('/pengaturan', [PengaturanController::class, 'update'])
    ->middleware('role:admin_aplikasi')
    ->name('pengaturan.update');
});