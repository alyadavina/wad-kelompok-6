<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BeasiswaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\ReminderController;


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

Route::get('/reminder/{beasiswa_id}', [App\Http\Controllers\ReminderController::class, 'showOptions'])
    ->name('reminder.showOptions')
    ->middleware('auth:mahasiswa');

Route::post('/reminder/simpan', [ReminderController::class, 'store'])->name('reminder.store');
Route::get('/reminder', [ReminderController::class, 'index'])->name('reminder.index')->middleware('auth:mahasiswa');
Route::get('/reminder', [ReminderController::class, 'index'])->name('reminder.index');
Route::delete('/reminder/{id}', [ReminderController::class, 'destroy'])->name('reminder.destroy');



