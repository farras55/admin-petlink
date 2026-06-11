<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Admin\FinanceController; // <-- IMPORT CONTROLLER FINANCE

// Redirect root ke login
Route::get('/', function () {
    return redirect('/login');
});

// Route untuk tamu (belum login)
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'authenticate']);
});

Route::middleware('auth')->group(function () {
    // 1. Dashboard Utama (Statistik)
    Route::get('/dashboard', [DashboardController::class, 'statistics'])->name('dashboard');
    
    // 2. Manajemen Klinik
    Route::get('/clinics/pending', [DashboardController::class, 'index'])->name('clinic.pending'); // Rute baru untuk Verifikasi
    Route::get('/clinics/history', [DashboardController::class, 'history'])->name('clinic.history');
    
    Route::get('/clinic/{id}', [DashboardController::class, 'showClinic'])->name('clinic.detail');
    Route::post('/clinic/{id}/approve', [DashboardController::class, 'approveClinic'])->name('clinic.approve');
    Route::post('/clinic/{id}/reject', [DashboardController::class, 'rejectClinic'])->name('clinic.reject');
    Route::post('/clinic/{id}/toggle-status', [DashboardController::class, 'toggleStatus'])->name('clinic.toggle_status'); 

    // 3. Manajemen Akun
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::post('/users/{id}/toggle-status', [UserController::class, 'toggleStatus'])->name('users.toggle_status');

    // 4. Manajemen Keuangan
    Route::get('/finance', [FinanceController::class, 'index'])->name('finance.index');
    
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});