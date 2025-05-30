<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BeasiswaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FavoriteController;

Route::get('/', function () {
    return view('welcome');
});


// Route::middleware('auth')->group(function () {
//     Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
// });

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('beasiswa', BeasiswaController::class)->middleware('auth');
require __DIR__.'/auth.php';

Route::resource('beasiswa', BeasiswaController::class);

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

// Route::post('/add-favorite/{beasiswa_id}', [BeasiswaController::class, 'addFavorite'])->name('addFavorite');

// Route::middleware(['auth'])->get('/favorite', [FavoriteController::class, 'index'])->name('favorite.index');


// Route::post('/favorite', [FavoriteController::class, 'store'])->name('favorits.store');
// Route::get('/favorite', [FavoriteController::class, 'index'])->name('favorits.index');

Route::post('/favorite/toggle/{beasiswa}', [FavoriteController::class, 'toggle'])->name('favorits.toggle');
Route::get('/favorite', [FavoriteController::class, 'index'])->name('favorits.index');

