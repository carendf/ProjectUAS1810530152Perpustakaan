<?php

use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('password', function(){
    return bcrypt('larin');
});

Route::get('lihatdatabuku', 'API\TabelBukuController@index');
Route::post('tambahdatabuku', 'API\TabelBukuController@store')->middleware('auth:api');
Route::patch('ubahdatabuku/{id}', 'API\TabelBukuController@update')->middleware('auth:api');
Route::delete('hapusdatabuku/{id}', 'API\TabelBukuController@destroy')->middleware('auth:api');
Route::get('lihatdatapinjaman', 'API\TabelPinjamanController@index');
Route::post('tambahdatapinjaman', 'API\TabelPinjamanController@store')->middleware('auth:api');
Route::patch('ubahdatapinjaman/{id}', 'API\TabelPinjamanController@update')->middleware('auth:api');
Route::delete('hapusdatapinjaman/{id}', 'API\TabelPinjamanController@destroy')->middleware('auth:api');

Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {

    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');

});