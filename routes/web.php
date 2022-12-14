<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\IndexController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\ThreadController;
use App\Models\Category;
use App\Models\Thread;
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
        $threads = Thread::orderBy('id', 'desc')->get();
        $categories = Category::all();
        return view('welcome', compact('threads', 'categories'));
})->name('welcome');

// ver todas las categorias
Route::get('dashboard/categories', [CategoryController::class, 'show'])->name('show.categories');
// Route::get('/category/{$category_id}/threads', [ThreadController::class, 'categoryShowThreads'])->name('welcome.category.show.threads');

// USERS VERIFIED
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        $threads = Thread::orderBy('id', 'desc')->get();
        $categories = Category::orderBy('id', 'desc')->get();
        return view('dashboard', compact('threads', 'categories'));
    })->name('dashboard');
});

// THREADS
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->name('thread.')->prefix('thread')->group(function () {
    Route::resource('/', ThreadController::class);
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