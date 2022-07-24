<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminAuthController;

Route::get('/', function () {
//    return view('welcome');
    dd(
        Auth::guard('admin')->user(),
        Auth::user(),
        );
})->name('mainPage');

Route::get('login', [AdminAuthController::class, 'login'])->name('login-page');
Route::post('login', [AdminAuthController::class, 'auth'])->name('login');
Route::get('logout', [AdminAuthController::class, 'logout'])->name('logout');

Route::prefix('books')->name('books.')->group(function () {
    Route::get('/', [BookController::class, 'list'])->name('list');
    Route::get('/{book}', [BookController::class, 'view'])->whereNumber('book')->name('view');
    Route::get('/create', [BookController::class, 'create'])->name('create');
    Route::post('/', [BookController::class, 'store'])->name('store');
    Route::get('/{book}/update', [BookController::class, 'update'])->whereNumber('book')->name('update');
    Route::post('/{book}', [BookController::class, 'edit'])->name('edit');
    Route::delete('/{book}', [BookController::class, 'delete'])->whereNumber('book')->name('delete');
});
