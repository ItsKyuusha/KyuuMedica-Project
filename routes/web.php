<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\DokterController;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\PoliController;
use App\Http\Controllers\ObatController;

Route::get('/', function () {
    return view('welcome');
});

// Auth routes
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [RegisterController::class, 'register']);
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

// Dashboard redirect
Route::middleware('auth')->group(function () {
    Route::get('/dir_admin/dashboard', function () {
        return view('dir_admin.dashboard');
    })->name('dir_admin.dashboard');

    Route::get('/dir_dokter/dashboard', function () {
        return view('dir_dokter.dashboard');
    })->name('dir_dokter.dashboard');

    Route::get('/dir_pasien/dashboard', function () {
        return view('dir_pasien.dashboard');
    })->name('dir_pasien.dashboard');
});

// Middleware auth + role:admin (optional kalau kamu pakai gate/policy)
Route::middleware(['auth'])->prefix('dir_admin')->name('dir_admin.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('dokter', DokterController::class)->except(['show']);
    Route::resource('pasien', PasienController::class)->except(['show']);
    Route::resource('poli', PoliController::class)->except(['show']);
    Route::resource('obat', ObatController::class)->except(['show']);
});

