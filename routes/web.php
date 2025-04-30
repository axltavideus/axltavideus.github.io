<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DangerousAccountController;

Route::get('/report', [DangerousAccountController::class, 'create'])->name('dangerous.create');
Route::post('/report', [DangerousAccountController::class, 'store'])->name('dangerous.store');

Route::get('/', function () {
    return view('home');
});