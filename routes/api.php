<?php

use App\Http\Controllers\API\AuthenticationController;
use App\Http\Controllers\API\CategoryController;
use App\Http\Controllers\API\MovieController;
use App\Http\Controllers\API\SubCategoryController;
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

Route::post('register', [AuthenticationController::class, 'register']);

Route::post('login', [AuthenticationController::class, 'login']);

Route::middleware('auth:api')->group(function () {
    Route::prefix('categories')->group(function () {
        Route::get('', [CategoryController::class, 'index']);
        Route::post('', [CategoryController::class, 'store']);
        Route::put('{id}', [CategoryController::class, 'edit']);
        Route::delete('{id}', [CategoryController::class, 'destroy']);
    });
    Route::prefix('sub_categories')->group(function () {
        Route::get('', [SubCategoryController::class, 'index']);
        Route::post('', [SubCategoryController::class, 'store']);
        Route::put('{id}', [SubCategoryController::class, 'edit']);
        Route::delete('{id}', [SubCategoryController::class, 'destroy']);
    });
    Route::prefix('movies')->group(function(){
        Route::get('', [MovieController::class, 'index']);
        Route::post('', [MovieController::class, 'store']);
        Route::put('{id}', [MovieController::class, 'edit']);
        Route::delete('{id}', [MovieController::class, 'destroy']);
    });
});


