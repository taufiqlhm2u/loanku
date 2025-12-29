<?php 

use App\Http\Controllers\BorrowerController;

Route::get('/home', [BorrowerController::class, 'index'])->name('borrower');