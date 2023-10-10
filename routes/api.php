<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


// Route::get('users', [UserController::class, 'index']);
// Route::get('users/{user}', [UserController::class, 'show']);
// Route::post('users', [UserController::class, 'store']);
// Route::put('users/{user}', [UserController::class, 'update']);
// Route::delete('users/{user}', [UserController::class, 'destroy']);

Route::group([
    'middleware' => 'auth:api'
], function () {
    Route::apiResource('users', UserController::class);
    Route::apiResource('categories', CategoryController::class);
    Route::apiResource('products', ProductController::class);
});

Route::post('signup', [UserController::class, 'signup']);
Route::post('signin', [UserController::class, 'signin']);
