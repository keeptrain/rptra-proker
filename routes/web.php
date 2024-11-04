<?php

use App\Http\Controllers\InstitutionalPartnersController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainProgramController;
use App\Http\Controllers\PriorityProgramController;

Route::get('/', function () {
    return view('welcome');
});

Route::controller(PriorityProgramController::class)->group(function () {
    Route::get('program-kerja', 'index')->name('prog-prioritas.index');
    Route::get('program-kerja/prioritas', 'show')->name('prog-prioritas.show');      
    Route::get('program-kerja/prioritas/tambah', 'create')->name('prog-prioritas.create');
    Route::post('program-kerja/prioritas/tambah', 'store')->name('prog-prioritas.store');
    Route::get('program-kerja/prioritas/ubah/{id}', 'edit')->name('prog-prioritas.edit');
    Route::delete('program-kerja/prioritas/hapus', 'destroy')->name('prog-prioritas.destroy');
});

Route::controller(MainProgramController::class)->group(function () {
    Route::get('program-kerja/pokok', 'show')->name('progpokok.show');      
    Route::get('program-kerja/pokok/tambah', 'create')->name('progpokok.create');
    Route::post('program-kerja/pokok/tambah', 'store')->name('progpokok.store');
    Route::delete('program-kerja/pokok/hapus', 'destroy')->name('progpokok.destroy');
});

Route::controller(InstitutionalPartnersController::class)->group(function () {
    Route::get('program-kerja/mitra', 'show')->name('prog-mitra.show');      
    Route::get('program-kerja/mitra/tambah', 'create')->name('prog-mitra.create');
    Route::post('program-kerja/mitra/tambah', 'store')->name('prog-mitra.store');
    Route::delete('program-kerja/mitra/hapus', 'destroy')->name('prog-mitra.destroy');
});