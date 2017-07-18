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
Route::get('sites/{id}', 'SitesController@show');
Route::post('sites', 'SitesController@store');
Route::put('sites/{id}', 'SitesController@update');
Route::delete('sites/{id}', 'SitesController@delete');


Route::get('subnets', 'SubnetsController@index');
Route::get('subnets/{id}', 'SubnetsController@show');
Route::post('subnets', 'SubnetsController@store');
Route::put('subnets/{id}', 'SubnetsController@update');
Route::delete('subnets/{id}', 'SubnetsController@delete');


Route::get('equipment', 'EquipmentController@index');
Route::get('equipment/{id}', 'EquipmentController@show');
Route::post('equipment', 'EquipmentController@store');
Route::put('equipment/{id}', 'EquipmentController@update');
Route::delete('equipment/{id}', 'EquipmentController@delete');