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
    return view('welcome', compact('threads'));
})->name('welcome');

// ver todas las categorias
Route::get('/categories', function (Category $category) {
    $categories = Category::orderBy('id', 'desc')->get();
    return view('welcome.categories-show', compact('categories'));
})->name('show.categories');

// ver hilos filtrados por categoria
Route::get('/threads/{category}', function (Category $category) {
    $threads = Thread::orderBy('id', 'desc')->get();
    return view('welcome.threads-category', compact('threads', 'category'));
})->name('show.threads');

// USERS VERIFIED
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        $threads = Thread::orderBy('id', 'desc')->get();
        return view('dashboard', compact('threads'));
    })->name('dashboard');
    // ver todas las categorias
    Route::get('/dashboard/categories', [CategoryController::class, 'showAll'])->name('categories');
    // ver hilos filtrados por categoria
    Route::get('/dashboard/threads/category/{category}', [CategoryController::class, 'threadsCategory'])->name('threads.category');
    // ver hilos filtrados por usuario
    Route::get('/dashboard/threads/user/{user}', [UserController::class, 'threadsUser'])->name('threads.user');
    // tabla usuarios
    Route::get('/dashboard/users', [UserController::class, 'viewUsers'])->name('users');
    Route::get('/dashboard/users/{user}', [UserController::class, 'show'])->name('users.show');
    // hilos
    Route::resource('/dashboard/threads', ThreadController::class);

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
