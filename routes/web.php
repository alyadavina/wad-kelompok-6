<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BeasiswaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('welcome');
});


Route::middleware('auth:mahasiswa')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');})->name('dashboard'); 
    });

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('beasiswa', BeasiswaController::class)->middleware('auth');
require __DIR__.'/auth.php';

Route::resource('beasiswa', BeasiswaController::class);

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::post('/favorite', [FavoriteController::class, 'store'])->name('favorit.store');
Route::get('/favorite', [FavoriteController::class, 'index'])->name('favorit.index');
Route::put('/favorit/{id}', [FavoriteController::class, 'update'])->name('favorit.update');
// Route::get('/register', [RegisterController::class, 'showForm'])->name('register.form');
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register.form');
Route::post('/register', [AuthController::class, 'register'])->name('register');