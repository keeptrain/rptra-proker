<?php

use App\Http\Controllers\PriorityProgramController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::controller(PriorityProgramController::class)->group(function () {
    Route::get('program-kerja', 'index');          // Mengambil daftar pengguna
    Route::get('/users/{id}', 'show');       // Mengambil detail pengguna berdasarkan ID
    Route::get('/users/{id}/profile', 'profile'); // Mengambil profil pengguna berdasarkan ID
});

Route::get('program-kerja', function() {
    return view('dashboard');
});

Route::get('/program-kerja/prioritas', function() {
    return view('work-program');
});

Route::get('/program-kerja/prioritas/tambah', function() {
    return view('add-work-program');
});