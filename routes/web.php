<?php

use App\Http\Controllers\commentsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\postsController;


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

Route::get('posts', [postsController::class,'index'])
->name('posts.index')
->middleware('auth');
Route::get('posts/create',[postsController::class, 'create'])
->name('posts.create')
->middleware('auth');
Route::get('/posts/{post}', [postsController::class, 'show'])
->name('posts.show')
->middleware('auth');
Route::get('/posts/edit/{post}', [postsController::class, 'edit'])
->name('posts.edit')
->middleware('auth');
Route::post('posts', [postsController::class, 'store'])
->name('posts.store')
->middleware('auth');
Route::put('posts/{post}', [postsController::class, 'update'])
->name('posts.update')
->middleware('auth');
Route::delete('posts/{post}', [postsController::class, 'destroy'])
->name('posts.destroy')
->middleware('auth');
// Route::get('posts', [PostController::class, 'index'])->name('posts.index');


// Comments Routes
Route::get('/posts/{post}/comments', [commentsController::class, 'index'])
->name('posts.comment')
->middleware('auth');
Route::post('/posts/{post}/comments', [commentsController::class, 'store'])
->name('posts.comment.store')
->middleware('auth');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
