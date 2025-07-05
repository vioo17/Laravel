<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MotorController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\PesananController;

Route::get('/', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/dashboard', [MotorController::class, 'create']);
Route::post('/motor', [MotorController::class, 'store'])->name('motor.store');



Route::get('/laporan', [LaporanController::class, 'index'])->name('laporan');
Route::get('/laporan/download', [LaporanController::class, 'download'])->name('laporan.download');

Route::post('/pesanan', [PesananController::class, 'store'])->name('pesanan.store');
Route::get('/pesanan', [PesananController::class, 'create'])->name('pesanan.create');
Route::get('/pesanan', [PesananController::class, 'create'])->name('pesanan');

