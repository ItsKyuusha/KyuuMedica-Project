<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Admin\DashboardAdminController;
use App\Http\Controllers\DokterController;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\PoliController;
use App\Http\Controllers\ObatController;
use App\Http\Controllers\DaftarPoliController;

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
    Route::get('/dashboard/dashboardAdmin', [DashboardAdminController::class, 'index'])->name('dashboard.dashboardAdmin');


    Route::get('/dashboard/dashboardDokter', function () {
        return view('dashboard.dashboardDokter');
    })->name('dashboard.dashboardDokter');

    Route::get('/dashboard/dashboardPasien', function () {
        return view('dashboard.dashboardPasien');
    })->name('dashboard.dashboardPasien');
});

Route::resource('dokter', DokterController::class);
Route::resource('pasien', PasienController::class);
Route::resource('poli', PoliController::class);
Route::resource('obat', ObatController::class);
Route::resource('daftarPoli', DaftarPoliController::class);


