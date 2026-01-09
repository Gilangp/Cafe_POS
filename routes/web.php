<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;

// Guest routes (belum login)
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});

// Authenticated routes
Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('dashboard');

    // Admin only routes
    Route::middleware('role:admin')->prefix('admin')->group(function () {
        // User Management
        Route::resource('users', UserController::class);
        Route::patch('users/{user}/toggle-status', [UserController::class, 'toggleStatus'])->name('users.toggle-status');

        // Menu Management (akan dibuat di step 10)
        // Route::resource('menus', MenuController::class);

        // Reports (akan dibuat nanti)
        // Route::get('reports/omzet', [ReportController::class, 'omzet'])->name('reports.omzet');
    });

    // Kasir only routes
    Route::middleware('role:kasir')->group(function () {
        // Transactions (akan dibuat di step 13)
        // Route::resource('transactions', TransactionController::class);
    });
});

// Default route
Route::get('/', function () {
    return redirect()->route('login');
});
