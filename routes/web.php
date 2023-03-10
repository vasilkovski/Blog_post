<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\Auth\RegisterController;

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
Route::middleware('auth')->group(function(){
Route::get('/', [PostController::class, 'index']);
Route::get('/create-blog', function () {
    return view('post.create');
});
Route::post('/search', [PostController::class, 'search'])->name('search');
Route::resource('/post', PostController::class)->parameters(['post' => 'post:slug']);;
Route::post('/post/{post}/comment', [CommentController::class, 'create_comment'])->name('post.comment');

});

Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
