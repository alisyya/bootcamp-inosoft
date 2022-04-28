<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\AuthController;

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
//Route::get('get_data_product','App\Http\Controllers\ProductController@getDataProduct');
//Route::get('get_data_cart','App\Http\Controllers\CartController@getDataCart');
//
//Route::post('/item', [
//    ItemController::class, 'tambahItem'
//]);
//
//Route::get('/item', [
//    ItemController::class, 'getAll'
//]);

Route::prefix('v1')->group(function () {
    Route::prefix('auth')->group(function () {
        // Below mention routes are public, user can access those without any restriction.
        // Create New User
        Route::post('register', 'App\Http\Controllers\AuthController@register');
        // Login User
        Route::post('login', 'App\Http\Controllers\AuthController@login');

        // Refresh the JWT Token
        Route::get('refresh', 'App\Http\Controllers\AuthController@refresh');

        // Below mention routes are available only for the authenticated users.
        Route::middleware('auth:api')->group(function () {
            // Get user info
            Route::get('user', 'App\Http\Controllers\AuthController@user');
            // Logout user from application
            Route::post('logout', 'App\Http\Controllers\AuthController@logout');
        });
    });
});
