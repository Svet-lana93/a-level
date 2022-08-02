<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\v1\StoreBookController;

Route::prefix('books')->name('books.')->group(function () {
    Route::get('/', [StoreBookController::class, 'list'])->name('list');
    Route::get('/{id}', [StoreBookController::class, 'view'])->whereNumber('id')->name('view');
    Route::get('/create', [StoreBookController::class, 'create'])->name('create');
//    Route::post('/', [StoreBookController::class, 'store'])->name('store');
//    Route::get('/{id}/update', [StoreBookController::class, 'update'])->whereNumber('id')->name('update');
    Route::put('/{id}', [StoreBookController::class, 'update'])->whereNumber('id');
    Route::delete('/{id}', [StoreBookController::class, 'delete'])->whereNumber('id')->name('delete');
});
