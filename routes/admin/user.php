<?php 
/*
** route untuk admin yang megelola user
*/


use App\Http\Controllers\Admin\UserController;
Route::prefix('/admin/users')->group(function() {
    Route::controller(UserController::class)->group(function (){
        Route::get('/', 'index')->name('userPage');
        Route::post('/', 'store');
        Route::delete('/delete/{id}', 'delete')->name('userDelete');
        Route::get('/trash', 'trash')->name('userTrash');
        Route::post('/restore/{id}', 'restore')->name('userRestore');
        Route::post('/restore-all', 'restoreAll')->name('userRestoreAll');
        Route::delete('/destroy/{id}', 'destroy')->name('userDestroy');
        Route::delete('/destroy-all', 'destroyAll')->name('userDestroyAll');
        Route::put('/update', 'update')->name('userUpdate');
    });
});