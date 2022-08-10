<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\v1\BookController;
use App\Http\Controllers\Api\v1\UserAuthenticationController;
use App\Http\Controllers\Api\v1\UserController;

Route::post('login', [UserAuthenticationController::class, 'login']);
Route::get('books/', [BookController::class, 'list'])->name('list');
Route::get('books/{id}', [BookController::class, 'view'])->whereNumber('id')->name('view');

Route::prefix('books')->name('books.')->group(function () {
    Route::post('/', [BookController::class, 'create'])->name('create');
    Route::put('/{id}', [BookController::class, 'update'])->whereNumber('id');
    Route::delete('/{id}', [BookController::class, 'delete'])->whereNumber('id')->name('delete');
});
//->middleware('auth_api')

Route::prefix('users')->name('users.')->group(function () {
    Route::get('/', [UserController::class, 'list']);
    Route::get('/{id}', [UserController::class, 'view'])->whereNumber('id');
    Route::post('/', [UserController::class, 'create']);
    Route::put('/{id}', [UserController::class, 'update'])->whereNumber('id');
    Route::delete('/{id}', [UserController::class, 'delete'])->whereNumber('id');
});
