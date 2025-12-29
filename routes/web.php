<?php

use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;


Route::middleware('guest')->group(function () {
    Route::get('/', function () {
        return redirect()->route('login');
    });
    // auth
    Route::controller(LoginController::class)->group(function() {
        Route::get('/login', 'login')->name('login');
        Route::post('/login', 'store');
    });
});

Route::post('/logout', [LoginController::class, 'logout']);

Route::middleware('auth')->group(function () {

// admin
Route::get('/admin', [AdminController::class, 'index'])->name('dashboard');
Route::get('/admin/dashboard', function() {
    redirect()->route('dashboard');
});

require_once 'admin/user.php';

// borrower
require 'borrower.php';
});