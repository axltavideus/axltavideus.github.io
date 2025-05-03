<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DangerousAccountController;
use App\Http\Controllers\HomeController;

Route::get('/report', [DangerousAccountController::class, 'create'])->name('dangerous.create');
Route::post('/report', [DangerousAccountController::class, 'store'])->name('dangerous.store');

Route::get('/cek-id', [DangerousAccountController::class, 'cekIdForm'])->name('dangerous.cekIdForm');
Route::post('/cek-id', [DangerousAccountController::class, 'cekIdSubmit'])->name('dangerous.cekIdSubmit');

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/kasus', [App\Http\Controllers\DangerousAccountController::class, 'index'])->name('dangerous.index');

Route::view('/contacts', 'contacts')->name('contacts');
