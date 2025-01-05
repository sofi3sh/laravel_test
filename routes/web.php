<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController as PublicPostController;


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
    return view('home');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::resource('posts', PostController::class);
});

Route::prefix('admin')->name('admin.')->middleware('auth')->group(function() {
    Route::resource('categories', CategoryController::class);
});

Route::get('/blog', [PublicPostController::class, 'index'])->name('posts.index');
Route::get('/blog/{id}', [PublicPostController::class, 'show'])->name('posts.show');
Route::post('/blog/{id}/comment', [CommentController::class, 'store'])->name('comments.store');