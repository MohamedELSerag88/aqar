<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::group([
    'prefix' => 'mobile/v1',
    'namespace' => 'App\Http\Controllers\Mobile\v1'
], function ($router) {
    Route::post('login', 'Auth\LoginController@login');
    Route::post('send-otp', 'Auth\SendOtpController@sendOtp');
    Route::post('check-otp', 'Auth\CheckOtpController@checkOtp');
    Route::post('forget-password', 'Auth\ForgetPasswordController@forgetPassword');
    Route::post('reset-password', 'Auth\ResetPasswordController@resetPassword');
    Route::post('register', 'Auth\RegisterController@register');
    Route::get('categories', 'Home\CategoryController@index');
    Route::get('cities', 'Home\CityController@index');
    Route::get('directions', 'Home\DirectionController@index');
    Route::get('districts', 'Home\DistrictController@index');
    Route::get('properties', 'Home\PropertyController@index');

    Route::group([
        'middleware' => ['auth']
    ], function ($router) {
    });

});


