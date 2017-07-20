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

Route::get('sites', 'SitesController@index');
Route::get('sites/{sites}', 'SitesController@show');
Route::post('sites', 'SitesController@store');
Route::put('sites/{sites}', 'SitesController@update');
Route::delete('sites/{sites}', 'SitesController@destroy');


Route::get('subnets', 'SubnetsController@index');
Route::get('subnets/{subnets}', 'SubnetsController@show');
Route::post('subnets', 'SubnetsController@store');
Route::put('subnets/{subnets}', 'SubnetsController@update');
Route::delete('subnets/{subnets}', 'SubnetsController@delete');


Route::get('equipment', 'EquipmentController@index');
Route::get('equipment/{equipment}', 'EquipmentController@show');
Route::post('equipment', 'EquipmentController@store');
Route::put('equipment/{equipment}', 'EquipmentController@update');
Route::delete('equipment/{equipment}', 'EquipmentController@delete');