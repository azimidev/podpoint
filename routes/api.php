<?php

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

Route::group(['api'], function() {
    Route::get('/units', 'UnitController@index');
    Route::get('/units/{unit}', 'UnitController@show');
    Route::post('/units/{unit}', 'ChargeController@store');
    Route::patch('/units/{unit}/charge/{charge}', 'ChargeController@update');
});

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
