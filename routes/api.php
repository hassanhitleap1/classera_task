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

Route::group(['prefix' => 'auth' ], function () {
    Route::post('login', 'AuthJwt\AuthController@login');
    Route::post('logout', 'AuthJwt\AuthController@logout');
    Route::post('refresh', 'AuthJwt\AuthController@refresh');
    Route::post('me', 'AuthJwt\AuthController@me');
    Route::post('registration','AuthJwt\AuthController@registration');
});


Route::group(['prefix' => 'user'], function () {
 
    Route::apiResources([
        'admins' => \Users\AdminController::class,
        'users' => \Users\UsersController::class,
    ]);

});