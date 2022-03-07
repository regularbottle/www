<?php

use Illuminate\Http\Request;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

/**
 * Inizio rotte hotels
 */
Route::get('/hotels',[
    \App\Http\Controllers\HotelController::class, 'readAll'
]);

Route::post('/hotels',[
    \App\Http\Controllers\HotelController::class, 'create'
]);

Route::delete('/hotels/{id}',[
    \App\Http\Controllers\HotelController::class, 'delete'
]);

Route::get('/hotels/{id}', [
    \App\Http\Controllers\HotelController::class, 'readSingle'
]);

Route::put('/hotels/{id}', [
    \App\Http\Controllers\HotelController::class, 'update'
]);

/**
 * Inizio rotte restaurants
 */
Route::get('/restaurants',[
    \App\Http\Controllers\RestaurantController::class, 'readAll'
]);

Route::post('/restaurants',[
    \App\Http\Controllers\RestaurantController::class, 'create'
]);

Route::delete('/restaurants/{id}',[
    \App\Http\Controllers\RestaurantController::class, 'delete'
]);

Route::get('/restaurants/{id}', [
    \App\Http\Controllers\RestaurantController::class, 'readSingle'
]);

Route::put('/restaurants/{id}', [
    \App\Http\Controllers\RestaurantController::class, 'update'
]);

/**
 * Inizio rotta teapot
 */
Route::get('/teapot',[
    \App\Http\Controllers\TeapotController::class, 'readAll'
]);