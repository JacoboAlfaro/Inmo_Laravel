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
//Category
Route::get('/v1/categories', [CategoryController::class, 'index'])->name('categories.index');
Route::get('/v1/categories/{category}', [CategoryController::class, 'show'])->name('categories.show');
//Business
Route::get('/v1/businesses', [BusinessController::class, 'index'])->name('businesses.index');
Route::get('/v1/businesses/{business}', [BusinessController::class, 'show'])->name('businesses.show');
//Location
Route::get('/v1/locations', [LocationController::class, 'index'])->name('locations.index');
Route::get('/v1/locations/{location}', [LocationController::class, 'show'])->name('locations.show');
//Property
Route::get('/v1/properties', [PropertyController::class, 'index'])->name('properties.index');
Route::get('/v1/properties/{property}', [PropertyController::class, 'show'])->name('properties.show');
//Characteristic
Route::get('/v1/characteristics', [CharacteristicController::class, 'index'])->name('characteristics.index');
Route::get('/v1/characteristics/{characteristic}', [CharacteristicController::class, 'show'])->name('characteristics.show');

Route::apiResource('v1/propchars', CharacteristicPropertyController::class);


// Route::apiResource('v1/users', UserController::class);

Route::middleware(['auth:sanctum'])->group(function() {

    Route::post('/v1/logout', [AuthController::class, 'logout'])->name('api.logout');
    Route::apiResource('v1/categories', CategoryController::class)->except(['index', 'show']);
    Route::apiResource('v1/businesses', BusinessController::class)->except(['index', 'show']);
    Route::apiResource('v1/locations', LocationController::class)->except(['index', 'show']);
    Route::apiResource('v1/properties', PropertyController::class)->except(['index', 'show']);
    Route::apiResource('v1/characteristics', CharacteristicController::class)->except(['index', 'show']);
 });