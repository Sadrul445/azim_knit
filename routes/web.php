<?php

use App\Http\Controllers\ComplianceController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HrController;
use App\Http\Controllers\MerchenController;
use App\Http\Controllers\OperationController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth', 'verified'])->group(function () {
    // Route::get('/dashboard', function () {
    //     return view('dashboard');
    // })->name('dashboard');
    
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

// Admin routes
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('admin/dashboard', [HomeController::class, 'index'])->name('admin.dashboard');
});

// HR routes
Route::middleware(['auth', 'hr'])->group(function () {
    Route::get('hr/dashboard', [HrController::class, 'index'])->name('hr.dashboard');
});

// Compliance routes
Route::middleware(['auth', 'compliance'])->group(function () {
    Route::get('compliance/dashboard', [ComplianceController::class, 'index'])->name('compliance.dashboard');
});

// Merchant routes
Route::middleware(['auth', 'merchandiser'])->group(function () {
    Route::get('merchandiser/dashboard', [MerchenController::class, 'index'])->name('merchant.dashboard');
});

// Operation routes
Route::middleware(['auth', 'operation'])->group(function () {
    Route::get('operation/dashboard', [OperationController::class, 'index'])->name('operation.dashboard');
});

// Route::middleware(['auth', 'admin'])->group(function () {
//     // Admin routes
//     Route::get('admin/dashboard', [HomeController::class, 'index'])->name('admin.dashboard');

//     // Admin can access all HR routes
//     Route::get('hr/dashboard', [HrController::class, 'index'])->name('hr.dashboard');
//     Route::get('hr/reports', [HrController::class, 'reports'])->name('hr.reports');
//     Route::get('hr/employees', [HrController::class, 'employees'])->name('hr.employees');

//     // Admin can access all Compliance routes
//     Route::get('compliance/dashboard', [ComplianceController::class, 'index'])->name('compliance.dashboard');
//     Route::get('compliance/audits', [ComplianceController::class, 'audits'])->name('compliance.audits');
//     Route::get('compliance/reports', [ComplianceController::class, 'reports'])->name('compliance.reports');

//     // Admin can access all Merchant routes
//     Route::get('merchant/dashboard', [MerchenController::class, 'index'])->name('merchant.dashboard');
//     Route::get('merchant/orders', [MerchenController::class, 'orders'])->name('merchant.orders');
//     Route::get('merchant/reports', [MerchenController::class, 'reports'])->name('merchant.reports');

//     // Admin can access all Operation routes
//     Route::get('operation/dashboard', [OperationController::class, 'index'])->name('operation.dashboard');
//     Route::get('operation/tasks', [OperationController::class, 'tasks'])->name('operation.tasks');
//     Route::get('operation/reports', [OperationController::class, 'reports'])->name('operation.reports');
// });
