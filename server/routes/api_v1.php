<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\v1\StoreBookController;
use App\Http\Controllers\Api\v1\UserAuthenticationController;
use App\Http\Controllers\Api\v1\StoreUserController;

Route::post('login', [UserAuthenticationController::class, 'login']);
Route::get('books/', [StoreBookController::class, 'list'])->name('list');
Route::get('books/{id}', [StoreBookController::class, 'view'])->whereNumber('id')->name('view');

Route::prefix('books')->name('books.')->group(function () {
    Route::post('/', [StoreBookController::class, 'create'])->name('create');
    Route::put('/{id}', [StoreBookController::class, 'update'])->whereNumber('id');
    Route::delete('/{id}', [StoreBookController::class, 'delete'])->whereNumber('id')->name('delete');
});
//->middleware('auth_api')

Route::prefix('users')->name('users.')->group(function () {
    Route::get('/', [StoreUserController::class, 'list']);
    Route::get('/{id}', [StoreUserController::class, 'view'])->whereNumber('id');
    Route::post('/', [StoreUserController::class, 'create']);
    Route::put('/{id}', [StoreUserController::class, 'update'])->whereNumber('id');
    Route::delete('/{id}', [StoreUserController::class, 'delete'])->whereNumber('id');
});
