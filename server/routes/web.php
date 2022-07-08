<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('mainPage');

Route::get('login', [AuthController::class, 'login'])->name('login-page');
Route::post('login', [AuthController::class, 'auth'])->name('login');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');

Route::prefix('users')->name('users.')->group(function () {
    Route::get('/', [UserController::class, 'getList'])->name('getList');
    Route::get('/{user}', [UserController::class, 'getOne'])->whereNumber('user')->name('getUser');
    Route::get('/create', [UserController::class, 'create'])->name('create');
    Route::post('/', [UserController::class, 'store'])->name('store');
    Route::get('/{user}/update', [UserController::class, 'update'])->whereNumber('user')->name('update');
    Route::post('/{user}', [UserController::class, 'edit'])->whereNumber('user')->name('edit');
    Route::delete('/{user}/delete', [UserController::class, 'delete'])->whereNumber('user')->name('delete');
});

Route::prefix('videos')->name('videos.')->group(function () {
    Route::get('/', [VideoController::class, 'getList'])->name('getList');
    Route::get('/{video}', [VideoController::class, 'getOne'])->whereNumber('video')->name('getVideo');
    Route::get('/create', [VideoController::class, 'create'])->name('create');
    Route::post('/', [VideoController::class, 'store'])->name('store');
    Route::get('/{video}/update', [VideoController::class, 'update'])->whereNumber('video')->name('update');
    Route::post('/{video}', [VideoController::class, 'edit'])->whereNumber('video')->name('edit');
    Route::delete('/{video}/delete', [VideoController::class, 'delete'])->whereNumber('video')->name('delete');
    Route::get('/{user}/user-videos', [VideoController::class, 'userVideos'])->whereNumber('user')->name('userVideos');
});

Route::prefix('books')->name('books.')->group(function () {
    Route::get('/', [BookController::class, 'list'])->name('list');
    Route::get('/{book}', [BookController::class, 'view'])->whereNumber('book')->name('view');
    Route::get('/create', [BookController::class, 'create'])->name('create');
    Route::post('/', [BookController::class, 'store'])->name('store');
    Route::get('/{book}/update', [BookController::class, 'update'])->whereNumber('book')->name('update');
    Route::post('/{book}', [BookController::class, 'edit'])->name('edit');
    Route::delete('/{book}', [BookController::class, 'delete'])->whereNumber('book')->name('delete');
});
