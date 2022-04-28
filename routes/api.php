<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\Api\AuthController;

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
Route::get('get_data_product','App\Http\Controllers\ProductController@getDataProduct');
Route::get('get_data_cart','App\Http\Controllers\CartController@getDataCart');

Route::post('/item', [
    ItemController::class, 'tambahItem'
]);

Route::get('/item', [
    ItemController::class, 'getAll'
]);

Route::namespace('App\Http\Controllers\Api')->middleware(['api'])->group(function ($router) {
        Route::post('login', 'AuthController@login');
        Route::post('logout', 'AuthController@logout');
        Route::post('refresh', 'AuthController@refresh');
        Route::post('me', 'AuthController@me');

    });
