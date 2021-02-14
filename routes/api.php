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
Route::group([ // Route group

    'prefix' => 'auth',
    'namespace'=>'App\Http\Controllers\Auth\api',

], function () {

Route::post('login', 'ApiAuthenticationControlller@login');
Route::post('register', 'ApiAuthenticationControlller@register');

});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::group([ // Route group

    'prefix' => 'crud',
    'namespace'=>'App\Http\Controllers',
    'middleware' => 'auth:api',

], function () {

    Route::resource('/requests','RequestController');
});

Route::group([ // Route group

    'prefix' => 'user',
    'namespace'=>'App\Http\Controllers',

], function () {

Route::get('return/{id}', 'UserApiController@get_user');

});
