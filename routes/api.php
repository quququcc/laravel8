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

Route::get('/name/{name}', function ($name) {
    return $name;
})->middleware('throttle');

Route::post('login', [\App\Http\Controllers\AuthController::class, 'login']);

Route::middleware('token.refresh')->group(function () {
    Route::post('logout', 'AuthController@logout');
    Route::post('me', 'AuthController@me');
    Route::post('refresh', 'AuthController@refresh');
});

Route::get('redis_index/{customers_id}', [\App\Http\Controllers\TestController::class, 'index']);

//Route::get('/user/login', [\App\Http\Controllers\UserController::class, 'index'])->name('login.index');

