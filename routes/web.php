<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\IndexController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

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

// PUBLIC
Route::get('/', function () {
    return view('welcome');
});

// USERS
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

// ADMIN
Route::middleware([
    'auth:sanctum',
    'role:admin',
    config('jetstream.auth_session'),
    'verified'
])->name('admin.')->prefix('admin')->group(function () {
    // Index
    Route::get('/', [IndexController::class, 'index'])->name('index');

    // Users
    Route::resource('/user', UserController::class);
    Route::post('/user/{user}', [UserController::class, 'assignRole'])->name('user.roles.assign');
    Route::delete('/user/{user}/roles/{role}', [UserController::class, 'removeRole'])->name('user.roles.remove');

    // Categories
    Route::resource('/categories', CategoryController::class);
});

// MODERATOR
/**  */
Route::middleware([
    'auth:sanctum',
    'role:moderator',
    config('jetstream.auth_session'),
    'verified'
])->name('admin.')->prefix('admin')->group(function () {
    // Index
    Route::get('/', [IndexController::class, 'index'])->name('index');

    // Users
    Route::resource('/user', UserController::class);
    Route::post('/user/{user}', [UserController::class, 'assignRole'])->name('user.roles.assign');

});