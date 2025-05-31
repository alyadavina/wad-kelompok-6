<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\NotifikasiController;
use App\Http\Controllers\Auth\MahasiswaLoginController;
use App\Http\Controllers\Admin\NotifikasiAdminController;

Route::get('/', function () {
    return view('welcome');
});


Route::middleware('auth:mahasiswa')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::middleware('auth:mahasiswa')->group(function () {
    Route::get('/notifikasi', [NotifikasiController::class, 'index'])->name('notifikasi.index');
    Route::post('/notifikasi/{id}/read', [NotifikasiController::class, 'markAsRead'])->name('notifikasi.markAsRead');
});


Route::get('/admindashboard', function () {
    return view('Admin/admindashboard');
})->name('admin.dashboard');
Route::resource('/admin/notifikasi', NotifikasiAdminController::class, [
    'as' => 'admin' 
]);


Route::get('/admindashboard', function () {
    return view('Admin/admindashboard');
})->name('admin.dashboard');



Route::get('/login', [MahasiswaLoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [MahasiswaLoginController::class, 'login'])->name('mahasiswa.login.submit');
Route::post('/logout', [MahasiswaLoginController::class, 'logout'])->name('logout');



Route::prefix('admin')->group(function () {
    Route::get('/notifikasi', [NotifikasiAdminController::class, 'index'])->name('admin.notifikasi.index');
    Route::post('/notifikasi', [NotifikasiAdminController::class, 'store'])->name('admin.notifikasi.store');
    Route::put('/notifikasi/{id}', [NotifikasiAdminController::class, 'update'])->name('admin.notifikasi.update');
    Route::delete('/notifikasi/{id}', [NotifikasiAdminController::class, 'destroy'])->name('admin.notifikasi.destroy');
});
