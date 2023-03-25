<?php

use App\Http\Controllers\API\AuthenticationController;
use App\Http\Controllers\API\CategoryController;
use App\Models\SubCategory;
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
        Route::get('', [SubCategory::class, 'index']);
        Route::post('', [SubCategory::class, 'store']);
        Route::put('{id}', [SubCategory::class, 'edit']);
        Route::delete('{id}', [SubCategory::class, 'destroy']);
    });
});


