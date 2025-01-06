<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\PriorityProgramController;
use App\Http\Controllers\PrincipalProgramController;
use App\Http\Controllers\TransactionProgramController;
use App\Http\Controllers\InstitutionalPartnersController;

Route::middleware('guest')->group(function () { 
    Route::get('login', [LoginController::class, 'index'])->name('login');
    Route::post('login', [LoginController::class, 'login'])->name('auth.login');
});

Route::middleware('auth')->group(function () { 
    Route::get('profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::get('settings/profile', [ProfileController::class, 'edit'])->name('profile.setting');
    Route::post('logout', [LoginController::class, 'logout'])->name('auth.logout');
    Route::patch('settings/profile', [ProfileController::class,'update'])->name('profile.update');
    Route::get('settings/password', [ProfileController::class,'editPassword'])->name('profile.password');
    Route::put('settings/password', [ProfileController::class,'updatePassword'])->name('profile.password.update');
});

Route::controller(DashboardController::class)->middleware('auth')
    ->group(function () {
    Route::get('/', 'index')->name('dashboard.index');
    Route::get('/transaction-total/{year}', 'getCreateTransactionYears')->name('transaction.total');
    Route::get('/get-schedule','getFilteredSchedule')->name('schedule.activity');
    Route::get('/get-available-months', 'getAvailableMonths')->name('months.available');
    Route::get('/get-information/{filter}','getInformation')->name('getInformation');
});

Route::controller(PriorityProgramController::class)->middleware('auth')
    ->group(function () {
    Route::get('program-kerja/prioritas', 'index')->name('prog-prioritas.index'); 
    Route::get('program-kerja/prioritas/buat', 'create')->name('prog-prioritas.create');
    Route::post('program-kerja/prioritas/tambah', 'store')->name('prog-prioritas.store');
    Route::get('program-kerja/prioritas/ubah/{id}', 'edit')->name('prog-prioritas.edit');
    Route::put('program-kerja/prioritas/ubah/{id}', 'update')->name('prog-prioritas.update');
    Route::delete('program-kerja/prioritas/hapus', 'destroy')->name('prog-prioritas.destroy');
});

Route::controller(PrincipalProgramController::class)->middleware('auth')
    ->group(function () {
    Route::get('program-kerja/pokok', 'index')->name('prog-pokok.index');
    Route::get('program-kerja/pokok/buat', 'create')->name('prog-pokok.create');
    Route::post('program-kerja/pokok/tambah', 'store')->name('prog-pokok.store');
    Route::get('program-kerja/pokok/ubah/{id}', 'edit')->name('prog-pokok.edit');
    Route::put('program-kerja/pokok/ubah/{id}', 'update')->name('prog-pokok.update');
    Route::delete('program-kerja/pokok/hapus', 'destroy')->name('prog-pokok.destroy');
});

Route::controller(InstitutionalPartnersController::class)->middleware('auth')
    ->group(function () {
    Route::get('program-kerja/mitra', 'index')->name('prog-mitra.index');     
    Route::get('program-kerja/mitra/buat', 'create')->name('prog-mitra.create');
    Route::post('program-kerja/mitra/tambah', 'store')->name('prog-mitra.store');
    Route::get('program-kerja/mitra/ubah/{id}', 'edit')->name('prog-mitra.edit');
    Route::put('program-kerja/mitra/ubah/{id}', 'update')->name('prog-mitra.update');
    Route::delete('program-kerja/mitra/hapus', 'destroy')->name('prog-mitra.destroy');
});

Route::controller(TransactionProgramController::class)->middleware('auth')
    ->group(function () {
    Route::get('program-kerja/transaksi', 'index')->name('prog-transaksi.index');
    Route::get('program-kerja/transaksi/draft', 'showDraft')->name('prog-transaksi.show.draft');
    Route::get('program-kerja/transaksi/detail/{id}', 'showDetailTransaction')->name('prog-transaksi.show.detail');        
    Route::get('program-kerja/transaksi/buat', 'create')->name('prog-transaksi.create');
    Route::post('program-kerja/transaksi/tambah', 'store')->name('prog-transaksi.store');
    Route::post('program-kerja/transaksi/tambah/draft', 'storeToDraft')->name('prog-transaksi.draft');
    Route::get('program-kerja/transaksi/ubah/{id}', 'edit')->name('prog-transaksi.edit');
    Route::put('program-kerja/transaksi/ubah/{id}', 'update')->name('prog-transaksi.update');
    Route::delete('program-kerja/transaksi/hapus', 'destroy')->name('prog-transaksi.destroy');
    Route::get('program-kerja/transaksi/export/all', 'exportAll')->name('prog-transaksi.export');
    Route::get('program-kerja/transaksi/export/custom', 'exportCustom')->name('prog-transaksi.export-custom');
});