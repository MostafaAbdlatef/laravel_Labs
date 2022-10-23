<?php

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

Route::get('posts', [postsController::class,'index'])->name('posts.index');
Route::get('posts/create',[postsController::class, 'create'])->name('posts.create');
Route::get('/posts/{post}', [postsController::class, 'show'])->name('posts.show');
Route::post('posts', [postsController::class, 'store'])->name('posts.store');
