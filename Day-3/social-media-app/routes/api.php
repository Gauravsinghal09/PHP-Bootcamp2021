<?php

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
Route::get('/user/{id}', [UserController::class, 'getUserById']);
Route::delete('/user/{id}', [UserController::class, 'deleteUser']);
Route::post('/post', [PostController::class, 'createPost']);
Route::get('/post/{user_id}', [PostController::class, 'getAllPostsByUserId']);
Route::get('/post', [PostController::class, 'getPostsByParams']);
