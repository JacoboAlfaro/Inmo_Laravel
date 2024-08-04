<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\CategoryController;
use App\Http\Controllers\Api\V1\BusinessController;
use App\Http\Controllers\Api\V1\LocationController;
use App\Http\Controllers\Api\V1\PropertyController;
use App\Http\Controllers\Api\V1\CharacteristicController;
use App\Http\Controllers\Api\V1\CharacteristicPropertyController;
use App\Http\Controllers\Api\V1\UserController;
use App\Http\Controllers\Api\V1\AuthController;


// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::post('/v1/login', [AuthController::class,'login'])->name('api.login');
Route::get('/v1/categories', [CategoryController::class, 'index'])->name('categories.index');
Route::apiResource('v1/propchars', CharacteristicPropertyController::class);


// Route::apiResource('v1/users', UserController::class);

Route::middleware(['auth:sanctum'])->group(function() {

    Route::post('/v1/logout', [AuthController::class, 'logout'])->name('api.logout');
    Route::apiResource('v1/categories', CategoryController::class)
        ->except(['index']);
    Route::apiResource('v1/businesses', BusinessController::class);
    Route::apiResource('v1/locations', LocationController::class);
    Route::apiResource('v1/properties', PropertyController::class);
    Route::apiResource('v1/characteristics', CharacteristicController::class);
 });