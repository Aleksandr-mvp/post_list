<?php

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

Route::get('/', [\App\Http\Controllers\HomeController::class, 'index'])->name('general');


Route::get('/posts', [\App\Http\Controllers\PostController::class, 'index'])->name('post.index');
Route::get('/posts/create', [\App\Http\Controllers\PostController::class, 'create'])->name('post.create');

Route::post('/posts', [\App\Http\Controllers\PostController::class, 'store'])->name('post.store');
Route::get('/posts/{post}', [\App\Http\Controllers\PostController::class, 'show'])->name('post.show');
Route::get('/posts/{post}/edit', [\App\Http\Controllers\PostController::class, 'edit'])->name('post.edit');
Route::patch('/posts/{post}', [\App\Http\Controllers\PostController::class, 'update'])->name('post.update');
Route::delete('/posts/{post}', [\App\Http\Controllers\PostController::class, 'destroy'])->name('post.delete');

/**
 * Роуты Админа
 */
Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function () {
    /**
     * Роуты для работы с постами
     */
    Route::group(['prefix' => 'post'], function () {
        Route::get('/', [\App\Http\Controllers\Admin\Post\PostController::class, 'index'])->name('admin.post.index');
        Route::get('/post/create', [\App\Http\Controllers\Admin\Post\PostController::class, 'create'])->name('admin.post.create');
        Route::post('/post', [\App\Http\Controllers\Admin\Post\PostController::class, 'store'])->name('admin.post.store');
        Route::get('{post}', [\App\Http\Controllers\Admin\Post\PostController::class, 'show'])->name('admin.post.show');
        Route::get('/post/{post}/edit', [\App\Http\Controllers\Admin\Post\PostController::class, 'edit'])->name('admin.post.edit');
        Route::patch('/post/{post}', [\App\Http\Controllers\Admin\Post\PostController::class, 'update'])->name('admin.post.update');
        Route::delete('/post/{post}', [\App\Http\Controllers\Admin\Post\PostController::class, 'destroy'])->name('admin.post.delete');
    });
});

Route::get('/main', [\App\Http\Controllers\MainController::class, 'index'])->name('main.index');
Route::get('/contacts', [\App\Http\Controllers\ContactController::class, 'index'])->name('contact.index');
Route::get('/about', [\App\Http\Controllers\AboutController::class, 'index'])->name('about.index');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
