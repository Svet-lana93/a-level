<?php

use App\Components\Store\Repositories\StoreRepositoryContract;
use App\Http\Controllers\LibraryController;
use App\Http\Controllers\RegistrationController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\IpWhitelistController;

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
//    dd(Auth::guard('admin')->user(),
//    Auth::user());
})->name('mainPage');
Route::get('test', function (StoreRepositoryContract  $storeRepository) {

    dd($storeRepository->byId(1));
});

Route::get('stores', [StoreController::class, 'getList'])->middleware('access_by_ip')->name('getList');
Route::get('stores/{id}', [StoreController::class, 'getOne'])->whereNumber('id')
    ->middleware('access_by_ip')->name('getOne');

Route::get('login', [AuthController::class, 'login'])->middleware('access_by_ip')->name('login-page');
Route::post('login', [AuthController::class, 'auth'])->middleware('access_by_ip')->name('login');
Route::get('logout', [AuthController::class, 'logout'])->middleware('access_by_ip')->name('logout');

Route::prefix('registration')->middleware('access_by_ip')->name('registration.')->group(function () {
    Route::get('/', [RegistrationController::class, 'view'])->name('register-page');
    Route::post('/', [RegistrationController::class, 'post'])->name('register');
    Route::get('/verification/{token}', [RegistrationController::class, 'verification'])->name('verification');
});

Route::prefix('users')->middleware('access_by_ip')->name('users.')->group(function () {
    Route::get('/', [UserController::class, 'getList'])->name('getList');
    Route::get('/{id}', [UserController::class, 'getOne'])->whereNumber('id')->name('getUser');
    Route::get('/create', [UserController::class, 'create'])->name('create');
    Route::post('/', [UserController::class, 'store'])->name('store');
    Route::get('/{id}/update', [UserController::class, 'update'])->whereNumber('id')->name('update');
    Route::post('/{id}', [UserController::class, 'edit'])->whereNumber('id')->name('edit');
    Route::delete('/{id}', [UserController::class, 'delete'])->whereNumber('id')->name('delete');
    Route::get('/{id}/videos', [UserController::class, 'userVideos'])->whereNumber('id')->name('userVideos');
});

Route::prefix('videos')->middleware('access_by_ip')->name('videos.')->group(function () {
    Route::get('/', [VideoController::class, 'getList'])->name('getList');
    Route::get('/{id}', [VideoController::class, 'getOne'])->whereNumber('id')->name('getVideo');
    Route::get('/create', [VideoController::class, 'create'])->name('create');
    Route::post('/', [VideoController::class, 'store'])->name('store');
    Route::get('/{id}/update', [VideoController::class, 'update'])->whereNumber('id')->name('update');
    Route::post('/{id}', [VideoController::class, 'edit'])->whereNumber('id')->name('edit');
    Route::delete('/{id}', [VideoController::class, 'delete'])->whereNumber('id')->name('delete');
});

Route::prefix('books')->middleware('access_by_ip')->name('books.')->group(function () {
    Route::get('/', [BookController::class, 'list'])->name('list');
    Route::get('/{id}', [BookController::class, 'view'])->whereNumber('id')->name('view');
    Route::get('/create', [BookController::class, 'create'])->middleware('token')->name('create');
    Route::post('/', [BookController::class, 'store'])->name('store');
    Route::get('/{id}/update', [BookController::class, 'update'])->middleware('my_auth:admin')
        ->whereNumber('id')->name('update');
    Route::post('/{id}', [BookController::class, 'edit'])->whereNumber('id')->name('edit');
    Route::delete('/{id}', [BookController::class, 'delete'])->whereNumber('id')->name('delete');
});

Route::resource('libraries', LibraryController::class)->middleware('access_by_ip');

Route::get('currentIp', [IpWhitelistController::class, 'add']);
