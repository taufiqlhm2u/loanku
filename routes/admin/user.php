<?php 
/*
** route untuk admin yang megelola user
*/


use App\Http\Controllers\Admin\UserController;
Route::prefix('/admin/user')->group(function() {
    Route::controller(UserController::class)->group(function (){
        Route::get('/', 'index')->name('userPage');
        Route::post('/', 'store');
        Route::delete('/delete/{id}', 'delete')->name('userDelete');
    });
});