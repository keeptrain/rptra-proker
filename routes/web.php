<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PriorityProgramController;
use App\Http\Controllers\PrincipalProgramController;
use App\Http\Controllers\TransactionProgramController;
use App\Http\Controllers\InstitutionalPartnersController;


//Route::get('program-kerja/dashboard',[DashboardController::class])->name('dashboard.index');


Route::resource('dashboard', DashboardController::class);
Route::controller(DashboardController::class)->group(function () {
    Route::get('program-kerja/dashboard', 'index')->name('dashboard.index');

});

Route::controller(PriorityProgramController::class)->group(function () {
    Route::get('program-kerja/prioritas', 'index')->name('prog-prioritas.index');
    //Route::get('program-kerja/prioritas/{prioritas}', 'show')->name('prog-prioritas.show');      
    Route::get('program-kerja/prioritas/create', 'create')->name('prog-prioritas.create');
    Route::post('program-kerja/prioritas/create', 'store')->name('prog-prioritas.store');
    Route::get('program-kerja/prioritas/ubah/{id}', 'edit')->name('prog-prioritas.edit');
    Route::put('program-kerja/prioritas/ubah/{id}', 'update')->name('prog-prioritas.update');
    Route::delete('program-kerja/prioritas/hapus', 'destroy')->name('prog-prioritas.destroy');
});

Route::controller(PrincipalProgramController::class)->group(function () {
    Route::get('program-kerja/pokok', 'index')->name('prog-pokok.index');
    //Route::get('program-kerja/pokok/{pokok}', 'show')->name('prog-pokok.show');      
    Route::get('program-kerja/pokok/create', 'create')->name('prog-pokok.create');
    Route::post('program-kerja/pokok/tambah', 'store')->name('prog-pokok.store');
    Route::get('program-kerja/pokok/ubah/{id}', 'edit')->name('prog-pokok.edit');
    Route::put('program-kerja/pokok/ubah/{id}', 'update')->name('prog-pokok.update');
    Route::delete('program-kerja/pokok/hapus', 'destroy')->name('prog-pokok.destroy');
});

Route::controller(InstitutionalPartnersController::class)->group(function () {
    Route::get('program-kerja/mitra', 'index')->name('prog-mitra.index');
    //Route::get('program-kerja/mitra/{mitra}', 'show')->name('prog-mitra.show');      
    Route::get('program-kerja/mitra/buat', 'create')->name('prog-mitra.create');
    Route::post('program-kerja/mitra/tambah', 'store')->name('prog-mitra.store');
    Route::get('program-kerja/mitra/ubah/{id}', 'edit')->name('prog-mitra.edit');
    Route::put('program-kerja/mitra/ubah/{id}', 'update')->name('prog-mitra.update');
    Route::delete('program-kerja/mitra/hapus', 'destroy')->name('prog-mitra.destroy');
});

Route::controller(TransactionProgramController::class)->group(function () {
    Route::get('program-kerja/transaksi', 'index')->name('prog-transaksi.index');
    //Route::get('program-kerja/transaksi/data', 'show')->name('prog-transaksi.show');
    Route::get('program-kerja/transaksi/draft', 'showDraft')->name('prog-transaksi.show.draft');
    Route::get('program-kerja/transaksi/detail/{id}', 'showDetailTransaction')->name('prog-transaksi.show.detail');        
    Route::get('program-kerja/transaksi/buat', 'create')->name('prog-transaksi.create');
    Route::post('program-kerja/transaksi/tambah', 'store')->name('prog-transaksi.store');
    Route::post('program-kerja/transaksi/tambah/draft', 'storeToDraft')->name('prog-transaksi.draft');
    Route::get('program-kerja/transaksi/ubah/{id}', 'edit')->name('prog-transaksi.edit');
    Route::put('program-kerja/transaksi/ubah/{id}', 'update')->name('prog-transaksi.update');
    Route::delete('program-kerja/transaksi/hapus', 'destroy')->name('prog-transaksi.destroy');
    Route::get('program-kerja/transaksi/export/', 'export')->name('prog-transaksi.export');
});