<?php

use Illuminate\Http\Request;
use Modules\Frontend\Http\Controllers\JsonCreationController;

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

Route::middleware('auth:sanctum')->get('/frontend', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:sanctum')->group(function () {

    Route::match(['get', 'post'], '/json', [JsonCreationController::class, 'store']);

});
