<?php

use Illuminate\Support\Facades\Route;
use App\http\Controllers\ArticleController;
use App\http\Controllers\CommentController;

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



Route::get('/articles', [ArticleController::class, 'index'])->name('articles');


Route::get('/articles/detail/{id}', [ArticleController::class, 'detail']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\ArticleController::class, 'index']);

Route::get('/', [App\Http\Controllers\ArticleController::class, 'index']);

Route::get('/articles/add', [ArticleController::class, 'add']);
Route::post('/articles/add', [ArticleController::class, 'create']);

Route::get('/articles/edit/{id}', [ArticleController::class, 'edit']);
Route::post('/articles/edit/{id}', [ArticleController::class, 'update']);

Route::get('/articles/delete/{id}', [ArticleController::class, 'delete']);



Route::post('/comments/add', [CommentController::class, 'create']);
Route::get('/comments/delete/{id}', [CommentController::class, 'delete']);

Route::get('/articles/add', [ArticleController::class, 'add'])->middleware('auth');
