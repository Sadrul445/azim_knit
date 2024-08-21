<?php

use App\Http\Controllers\ComplianceController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HrController;
use App\Http\Controllers\MerchenController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('admin/dashboard',[HomeController::class,'index'])->middleware(['auth','admin']);
Route::get('hr/dashboard',[HrController::class,'index'])/* ->middleware(['auth','admin']) */;
Route::get('compliance/dashboard',[ComplianceController::class,'index'])/* ->middleware(['auth','admin']) */;
Route::get('merchant/dashboard',[MerchenController::class,'index'])/* ->middleware(['auth','admin']) */;
// Route::get('admin/dashboard',[HomeController::class,'index'])->middleware(['auth','admin']);