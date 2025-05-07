<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DangerousAccountController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Middleware\AuthenticateAdmin;

Route::get('/report', [DangerousAccountController::class, 'create'])->name('dangerous.create');
Route::post('/report', [DangerousAccountController::class, 'store'])->name('dangerous.store');

Route::get('/cek-id', [DangerousAccountController::class, 'cekIdForm'])->name('dangerous.cekIdForm');
Route::post('/cek-id', [DangerousAccountController::class, 'cekIdSubmit'])->name('dangerous.cekIdSubmit');

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/kasus', [App\Http\Controllers\DangerousAccountController::class, 'index'])->name('dangerous.index');
Route::get('/kasus/{id}', [App\Http\Controllers\DangerousAccountController::class, 'show'])->name('dangerous.show');

Route::view('/contacts', 'contacts')->name('contacts');

// Admin login routes
Route::get('/admin/login', [LoginController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [LoginController::class, 'login'])->name('admin.login.submit');
Route::post('/admin/logout', [LoginController::class, 'logout'])->name('admin.logout');

// Admin register routes
Route::get('/admin/register', [LoginController::class, 'showRegisterForm'])->name('admin.register');
Route::post('/admin/register', [LoginController::class, 'register'])->name('admin.register.submit');

// Admin dashboard route protected by middleware
Route::middleware([AuthenticateAdmin::class])->group(function () {

    // Admin routes for dangerous accounts management
    Route::prefix('admin/dangerous-accounts')->name('admin.dangerous_accounts.')->group(function () {
        Route::get('/', [DangerousAccountController::class, 'adminIndex'])->name('index');
        Route::get('/create', [DangerousAccountController::class, 'adminCreate'])->name('create');
        Route::post('/', [DangerousAccountController::class, 'adminStore'])->name('store');
        Route::get('/{id}/edit', [DangerousAccountController::class, 'adminEdit'])->name('edit');
        Route::put('/{id}', [DangerousAccountController::class, 'adminUpdate'])->name('update');
        Route::delete('/{id}', [DangerousAccountController::class, 'adminDestroy'])->name('destroy');
    });

    // Admin routes for dangerous phone numbers management
    Route::prefix('admin/dangerous-phone-numbers')->name('admin.dangerous_phone_numbers.')->group(function () {
        Route::get('/', [App\Http\Controllers\DangerousPhoneNumberController::class, 'adminIndex'])->name('index');
        Route::get('/create', [App\Http\Controllers\DangerousPhoneNumberController::class, 'adminCreate'])->name('create');
        Route::post('/', [App\Http\Controllers\DangerousPhoneNumberController::class, 'adminStore'])->name('store');
        Route::get('/{id}/edit', [App\Http\Controllers\DangerousPhoneNumberController::class, 'adminEdit'])->name('edit');
        Route::put('/{id}', [App\Http\Controllers\DangerousPhoneNumberController::class, 'adminUpdate'])->name('update');
        Route::delete('/{id}', [App\Http\Controllers\DangerousPhoneNumberController::class, 'adminDestroy'])->name('destroy');
    });
});

use Illuminate\Http\Request;

// User route for dangerous phone number search
Route::match(['get', 'post'], '/dangerous-phone-numbers/search', [App\Http\Controllers\DangerousPhoneNumberController::class, 'userSearch'])->name('dangerous_phone_numbers.search');
