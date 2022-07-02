<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\VideoController;

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

Route::prefix('users')->name('users.')->group(function () {
    Route::get('/', [UserController::class, 'getList'])->name('getList');
    Route::get('/{user}', [UserController::class, 'getOne'])->whereNumber('user')->name('getUser');
    Route::match(['get', 'post'], '/create', [UserController::class, 'create'])->name('create');
    Route::match(['get', 'put'], '/{user}/update', [UserController::class, 'update'])
        ->whereNumber('user')->name('update');
    Route::delete('/{user}/delete', [UserController::class, 'delete'])->whereNumber('user')->name('delete');
});

Route::prefix('videos')->name('videos.')->group(function () {
    Route::get('/', [VideoController::class, 'getList'])->name('getList');
    Route::get('/{video}', [VideoController::class, 'getOne'])->whereNumber('video')->name('getVideo');
    Route::match(['get', 'post'], '/create', [VideoController::class, 'create'])->name('create');
    Route::match(['get', 'put'], '/{video}/update', [VideoController::class, 'update'])
        ->whereNumber('video')->name('update');
    Route::delete('/{video}/delete', [VideoController::class, 'delete'])->whereNumber('video')->name('delete');
    Route::get('/{user}/user-videos', [VideoController::class, 'userVideos'])->whereNumber('user')->name('userVideos');
});

Route::prefix('books')->name('books.')->group(function () {
    Route::get('/', [BookController::class, 'list'])->name('list');
    Route::get('/create', [BookController::class, 'create']);
    Route::get('/{id}', [BookController::class, 'view'])->whereNumber('id')->name('view');
});
