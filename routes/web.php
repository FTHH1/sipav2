<?php

use Illuminate\Support\Facades\Route;

Route::get('/', fn () => view('welcome'))->name('home');

Route::middleware('auth')->group(function () {

    // Satu dashboard untuk semua role
    Route::get('/dashboard', fn () => view('dashboard'))
        ->name('dashboard');

    // Alias admin dashboard (opsional, untuk redirect Fortify)
    Route::middleware('role:admin')->group(function () {
        Route::get('/admin/dashboard', fn () => view('dashboard'))
            ->name('admin.dashboard');
    });

});

require __DIR__.'/settings.php';
