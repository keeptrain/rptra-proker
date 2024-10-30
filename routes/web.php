<?php

use App\Http\Controllers\InstitutionalPartnersController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainProgramController;
use App\Http\Controllers\PriorityProgramController;

Route::get('/', function () {
    return view('welcome');
});

Route::controller(PriorityProgramController::class)->group(function () {
    Route::get('program-kerja', 'index')->name('proker.index');
    Route::get('program-kerja/prioritas', 'show')->name('proker.show');      
    Route::get('program-kerja/prioritas/tambah', 'create')->name('proker.create');
    Route::post('program-kerja/prioritas/tambah', 'store')->name('proker.store');
    Route::delete('program-kerja/prioritas/hapus', 'destroy')->name('progprio.destroy');
});

Route::controller(MainProgramController::class)->group(function () {
    Route::get('program-kerja/pokok', 'show')->name('progpokok.show');      
    Route::get('program-kerja/pokok/tambah', 'create')->name('progpokok.create');
    Route::post('program-kerja/pokok/tambah', 'store')->name('progpokok.store');
    Route::delete('program-kerja/pokok/{id}', 'destroy')->name('progpokok.destroy');
});

Route::controller(InstitutionalPartnersController::class)->group(function () {
    Route::get('program-kerja/mitra', 'show')->name('progmitra.show');      
    Route::get('program-kerja/mitra/tambah', 'create')->name('progmitra.create');
    Route::post('program-kerja/mitra/tambah', 'store')->name('progmitra.store');
    Route::delete('program-kerja/mitra/{id}', 'destroy')->name('progutmitra.destroy');
});