<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::post('/user', [UserController::class, 'createUser']);
Route::get('/user', [UserController::class, 'getAllUsers']);
Route::get('/user/{id}', [UserController::class, 'getUserById'])->where('id', '[0-9]+');
Route::delete('/user/{id}', [UserController::class, 'deleteUser'])->where('id', '[0-9]+');
Route::post('/post', [PostController::class, 'createPost']);
Route::get('/post', [PostController::class, 'getPostsByParams']);
Route::patch('/post/{id}', [PostController::class, 'updatePost'])->where('id', '[0-9]+');
Route::delete('/post/{id}', [PostController::class, 'deletePost'])->where('id', '[0-9]+');
Route::post('/comment', [CommentController::class, 'createComment']);
Route::get('/comment', [CommentController::class, 'getCommentsByParams']);
Route::patch('/comment/{id}', [CommentController::class, 'updateComment'])->where('id', '[0-9]+');
Route::delete('/comment/{id}', [CommentController::class, 'deleteComment'])->where('id', '[0-9]+');
