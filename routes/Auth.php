<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\MahasiswaLoginController;

Route::get('/login', [MahasiswaLoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [MahasiswaLoginController::class, 'login']);
Route::post('/logout', [MahasiswaLoginController::class, 'logout'])->name('logout');