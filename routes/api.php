<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\HomeController;
use App\Http\Controllers\Api\V1\ServiceController;
use App\Http\Controllers\Api\V1\ProjectController;
use App\Http\Controllers\Api\V1\ProductController;
use App\Http\Controllers\Api\V1\BlogController;
use App\Http\Controllers\Api\V1\AboutController;
use App\Http\Controllers\Api\V1\TeamController;
use App\Http\Controllers\Api\V1\PartnerController;
use App\Http\Controllers\Api\V1\CommentController;
use App\Http\Controllers\Api\V1\ContactController;
use App\Http\Controllers\Api\V1\AuthController;

/*
|--------------------------------------------------------------------------
| API v1 Routes — for Flutter mobile app
|--------------------------------------------------------------------------
*/

Route::prefix('v1')->group(function () {

    // Public routes
    Route::get('/home',      [HomeController::class,    'index']);
    Route::get('/services',  [ServiceController::class, 'index']);
    Route::get('/services/{id}', [ServiceController::class, 'show']);
    Route::get('/projects',  [ProjectController::class, 'index']);
    Route::get('/projects/{id}', [ProjectController::class, 'show']);
    Route::get('/products',  [ProductController::class, 'index']);
    Route::get('/products/{id}', [ProductController::class, 'show']);
    Route::get('/blogs',     [BlogController::class,    'index']);
    Route::get('/blogs/{id}', [BlogController::class,   'show']);
    Route::get('/about',     [AboutController::class,   'index']);
    Route::get('/team',      [TeamController::class,    'index']);
    Route::get('/partners',  [PartnerController::class, 'index']);
    Route::get('/comments',  [CommentController::class, 'index']);
    Route::post('/contact',  [ContactController::class, 'store']);

    // Auth
    Route::post('/auth/login',    [AuthController::class, 'login']);
    Route::post('/auth/register', [AuthController::class, 'register']);

    // Protected routes
    Route::middleware('auth:sanctum')->group(function () {
        Route::get('/auth/me',     [AuthController::class, 'me']);
        Route::post('/auth/logout',[AuthController::class, 'logout']);
    });
});

// Fallback
Route::fallback(fn() => response()->json(['message' => 'Not Found'], 404));
