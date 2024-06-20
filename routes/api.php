<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ApiAuthController;
use App\Http\Controllers\Api\ApiPlantController;

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

Route::post('/register', [ApiAuthController::class, 'register']);
Route::middleware('auth:sanctum')->post('/login', [ApiAuthController::class, 'login']);
Route::middleware('auth:sanctum')->post('/logout', [ApiAuthController::class, 'logout']);
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/plants', [ApiPlantController::class, 'store']);
});

Route::apiResource('plants', ApiPlantController::class);
