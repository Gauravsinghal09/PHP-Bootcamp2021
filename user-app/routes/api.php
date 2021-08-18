<?php

use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\EnsureTokenIsValid;

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

Route::middleware([EnsureTokenIsValid::class])->group(function () {
    Route::get('user', [UserController::class, 'getAllUsers']);
    Route::get('user/{id}', [UserController::class, 'getUserById']);
    Route::post('user', [UserController::class, 'createUser']);
    Route::patch('user/{id}', [UserController::class, 'updateUser']);
    Route::delete('user/{id}', [UserController::class, 'deleteUser']);
});
