<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

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
    Route::get('/Admin/dashboardAdmin', function () {
            return view('admin.dashboardAdmin');
        })->name('admin.dashboardAdmin');

    Route::get('/Dokter/dashboardDokter', function () {
        return view('dokter.dashboardDokter');
    })->name('dokter.dashboardDokter');

    Route::get('/Pasien/dashboardPasien', function () {
        return view('pasien.dashboardPasien');
    })->name('pasien.dashboardPasien');
});
