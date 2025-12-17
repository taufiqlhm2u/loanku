<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// admin
Route::get('/admin', function() {
    return view('admin.dashboard');
});

require_once 'admin/user.php';