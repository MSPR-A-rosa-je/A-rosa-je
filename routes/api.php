<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ApiAuthController;
use App\Http\Controllers\Api\ApiPlantController;
use App\Http\Controllers\Api\ApiAddressController;
use App\Http\Controllers\Api\ApiMissionsController;
use App\Http\Controllers\Api\ApiAdvicesController;

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

Route::prefix('v1')->group(function () {

    Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
        return $request->user();
    });

    Route::post('/register', [ApiAuthController::class, 'register']);
    Route::middleware('auth:sanctum')->post('/login', [ApiAuthController::class, 'login']);
    Route::middleware('auth:sanctum')->post('/logout', [ApiAuthController::class, 'logout']);
    Route::middleware('auth:sanctum')->group(function () {
    });
});

Route::prefix('v1')->group(function () {
    Route::apiResource('plants', ApiPlantController::class);
    Route::apiResource('address', ApiAddressController::class);
    Route::apiResource('missions', ApiMissionsController::class);
    Route::apiResource('advices', ApiAdvicesController::class);

});
