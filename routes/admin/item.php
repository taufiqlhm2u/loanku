<?php 

use App\Http\Controllers\Admin\ItemController;

Route::prefix('/admin/items')->group(function () {
    Route::controller(ItemController::class)->group(function () {
        Route::get('/', 'index')->name('itemPage');
        Route::post('/', 'store');
        Route::put('/update/{id}', 'update')->name('itemUpdate');
        Route::delete('/delete/{id}', 'delete')->name('itemDelete');
        Route::get('/trash', 'trash')->name('itemTrash');
        Route::post('/restore/{id}', 'restore')->name('itemRestore');
        Route::post('/restore-all', 'restoreAll')->name('itemRestoreAll');
        Route::delete('/destroy/{id}', 'destroy')->name('itemDestroy');
        Route::delete('/destroy-all', 'destroyAll')->name('itemDestroyAll');
    });
});