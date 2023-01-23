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

Route::resource('categories', App\Http\Controllers\API\CategoryAPIController::class);
//    ->except(['create', 'edit']);

Route::middleware(['auth:sanctum'])->group(function () {

    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    Route::resource('products', App\Http\Controllers\API\ProductAPIController::class)
        ->except(['create', 'edit']);

    Route::resource('carts', App\Http\Controllers\API\CartAPIController::class)
        ->except(['create', 'edit']);

    Route::resource('attributes', App\Http\Controllers\API\AttributeAPIController::class)
        ->except(['create', 'edit']);

});


