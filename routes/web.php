<?php

use App\Http\Controllers\buku_paketController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('layout');
});

Route::get('/paket/dashboard',[buku_paketController::class, 'dashboard'])->name('dashboard');
Route::post('/insert', [buku_paketController::class, 'insert'] )->name('insert');

// Tamu
Route::resource('tamus', TamuController::class);
