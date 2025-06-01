<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
<<<<<<< HEAD
use App\Http\Controllers\BeasiswaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\AuthController;
=======
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\NotifikasiController;
use App\Http\Controllers\Auth\MahasiswaLoginController;
use App\Http\Controllers\Admin\NotifikasiAdminController;
use App\Http\Controllers\Admin\BeasiswaAdminController;
use App\Http\Controllers\Admin\AdminPenggunaController;

>>>>>>> origin/Davy_brench

Route::get('/', function () {
    return view('welcome');
});


<<<<<<< HEAD
Route::middleware('auth')->group(function () {
=======
Route::middleware('auth:mahasiswa')->group(function () {
>>>>>>> origin/Davy_brench
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

<<<<<<< HEAD
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('beasiswa', BeasiswaController::class)->middleware('auth');
require __DIR__.'/auth.php';

Route::resource('beasiswa', BeasiswaController::class);
=======
>>>>>>> origin/Davy_brench

Route::get('/', function () {
    return view('welcome');
});

<<<<<<< HEAD
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});


Route::post('/favorite', [FavoriteController::class, 'store'])->name('favorit.store');
Route::get('/favorite', [FavoriteController::class, 'index'])->name('favorit.index');
Route::put('/favorit/{id}', [FavoriteController::class, 'update'])->name('favorit.update');
// Route::get('/register', [RegisterController::class, 'showForm'])->name('register.form');
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register.form');
Route::post('/register', [AuthController::class, 'register'])->name('register');
=======
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


Route::get('/admin/listusers', [AdminPenggunaController::class, 'index'])->name('admin.users');
    

Route::get('/login', [MahasiswaLoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [MahasiswaLoginController::class, 'login'])->name('mahasiswa.login.submit');
Route::post('/logout', [MahasiswaLoginController::class, 'logout'])->name('logout');



Route::prefix('admin')->group(function () {
    Route::get('/notifikasi', [NotifikasiAdminController::class, 'index'])->name('admin.notifikasi.index');
    Route::post('/notifikasi', [NotifikasiAdminController::class, 'store'])->name('admin.notifikasi.store');
    Route::put('/notifikasi/{id}', [NotifikasiAdminController::class, 'update'])->name('admin.notifikasi.update');
    Route::delete('/notifikasi/{id}', [NotifikasiAdminController::class, 'destroy'])->name('admin.notifikasi.destroy');
});

Route::prefix('admin')->group(function () {
    Route::get('/beasiswa', [BeasiswaAdminController::class, 'index'])->name('admin.beasiswa.index');
    Route::post('/beasiswa', [BeasiswaAdminController::class, 'store'])->name('admin.beasiswa.store');
    Route::put('/beasiswa/{id}', [BeasiswaAdminController::class, 'update'])->name('admin.beasiswa.update');
    Route::delete('/beasiswa/{id}', [BeasiswaAdminController::class, 'destroy'])->name('admin.beasiswa.destroy');
});
>>>>>>> origin/Davy_brench
