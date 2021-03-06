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


Route::controller(\App\Http\Controllers\Api\ColumnController::class)->group(function () {
    Route::post('columns/', 'index');
    Route::post('columns/create', 'store');
    Route::get('columns/{id}', 'show');
    Route::patch('columns/{id}', 'update');
    Route::delete('columns/{id}', 'destroy');
});

Route::controller(\App\Http\Controllers\Api\CardController::class)->group(function () {
    Route::post('cards/create/{column}', 'store');
    Route::patch('cards/{id}', 'update');
    Route::delete('cards/{id}', 'destroy');
});

Route::controller(\App\Http\Controllers\Api\DatabaseController::class)->group(function () {
    Route::post('database/export', 'export');
});
