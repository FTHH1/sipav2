<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home'); 

Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/dashboard-petugas', function () {
        return view('dashboard');
    })->name('dashboard.petugas');

    Route::get('/dashboard-peminjam', function () {
        return view('dashboard');
    })->name('dashboard.peminjam');

    Route::get('/dashboard', fn () => view('dashboard'))
    ->middleware('auth')
    ->name('dashboard');

    Route::get('/admin/dashboard', fn () => view('admin.dashboard'))
    ->middleware('auth')
    ->name('admin.dashboard');

    Route::middleware(['auth', 'role:petugas'])->group(function () {
    Route::get('/petugas', fn () => view('dashboard'));
    });

    Route::middleware(['auth', 'role:peminjam'])->group(function () {
    Route::get('/peminjam', fn () => view('dashboard'));
    });


});


require __DIR__.'/settings.php';
