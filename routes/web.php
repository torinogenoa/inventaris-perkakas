<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PerkakasController;

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Group Route yang harus login dulu
Route::middleware(['auth'])->group(function () {
    // Route CRUD umum (Bisa diakses Admin & User)
    Route::resource('perkakas', PerkakasController::class)->except(['destroy']);
    
    // Route khusus Delete (Hanya Admin)
    Route::delete('/perkakas/{perkakas}', [PerkakasController::class, 'destroy'])
         ->middleware('admin')
         ->name('perkakas.destroy');
});