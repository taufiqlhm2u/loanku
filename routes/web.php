<?php

use App\Http\Controllers\admin\AdminController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// admin
Route::get('/admin', [AdminController::class, 'index']);

require_once 'admin/user.php';