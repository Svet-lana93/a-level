<?php

use App\Http\Controllers\AdminAuthController;
use Illuminate\Support\Facades\Auth;
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
//    return view('welcome');
    dd(Auth::guard('admin')->user(),
    Auth::user());
})->name('mainPage');

Route::get('login', [AuthController::class, 'login'])->name('login-page');
Route::post('login', [AuthController::class, 'auth'])->name('login');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');

Route::prefix('users')->name('users.')->group(function () {
    Route::get('/', [UserController::class, 'getList'])->name('getList');
    Route::get('/{id}', [UserController::class, 'getOne'])->whereNumber('id')->name('getUser');
    Route::get('/create', [UserController::class, 'create'])->name('create');
    Route::post('/', [UserController::class, 'store'])->name('store');
    Route::get('/{id}/update', [UserController::class, 'update'])->whereNumber('id')->name('update');
    Route::post('/{id}', [UserController::class, 'edit'])->whereNumber('id')->name('edit');
    Route::delete('/{id}', [UserController::class, 'delete'])->whereNumber('id')->name('delete');
    Route::get('/{id}/videos', [UserController::class, 'userVideos'])->whereNumber('id')->name('userVideos');
});

Route::prefix('videos')->name('videos.')->group(function () {
    Route::get('/', [VideoController::class, 'getList'])->name('getList');
    Route::get('/{id}', [VideoController::class, 'getOne'])->whereNumber('id')->name('getVideo');
    Route::get('/create', [VideoController::class, 'create'])->name('create');
    Route::post('/', [VideoController::class, 'store'])->name('store');
    Route::get('/{id}/update', [VideoController::class, 'update'])->whereNumber('id')->name('update');
    Route::post('/{id}', [VideoController::class, 'edit'])->whereNumber('id')->name('edit');
    Route::delete('/{id}', [VideoController::class, 'delete'])->whereNumber('id')->name('delete');
});

Route::prefix('books')->name('books.')->group(function () {
    Route::get('/', [BookController::class, 'list'])->name('list');
    Route::get('/{id}', [BookController::class, 'view'])->whereNumber('id')->name('view');
    Route::get('/create', [BookController::class, 'create'])->name('create');
    Route::post('/', [BookController::class, 'store'])->name('store');
    Route::get('/{id}/update', [BookController::class, 'update'])->whereNumber('id')->name('update');
    Route::post('/{id}', [BookController::class, 'edit'])->whereNumber('id')->name('edit');
    Route::delete('/{id}', [BookController::class, 'delete'])->whereNumber('id')->name('delete');
});
