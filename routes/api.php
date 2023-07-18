<?php

use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\Api\RestaurantController;
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

Route::name('api.')->group(function () {
      Route::resource('categories', CategoryController::class)->only(['index', 'show']);
      Route::resource('restaurants', RestaurantController::class)->only(['index', 'show']);
      Route::resource('orders', OrderController::class)->only(['store']);
});
