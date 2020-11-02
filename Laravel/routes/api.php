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

** Basic Routes for a RESTful service:
**
** Route::get($uri, $callback);
** Route::post($uri, $callback);
** Route::put($uri, $callback);
** Route::delete($uri, $callback);
**
*/
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('stores', 'StoresController@index');
Route::get('stores/{store}', 'StoresController@show');
Route::post('stores','StoresController@store');
Route::put('stores/{store}','StoresController@update');
Route::delete('stores/{store}', 'StoresController@delete');

Route::get('adresses', 'AddressesController@index');
Route::get('addresses/{addresse}', 'AddressesController@show');
Route::post('addresses','AddressesController@addresse');
Route::put('addresses/{addresse}','AddressesController@update');
Route::delete('addresses/{addresse}', 'AddressesController@delete');

Route::get('sites', 'SitesController@index');
Route::get('sites/{site}', 'SitesController@show');
Route::post('sites','SitesController@site');
Route::put('sites/{sites}','SitesController@update');
Route::delete('sites/{site}', 'SitesController@delete');

Route::get('cfsFlags', 'CfsFlagsController@index');
Route::get('cfsFlags/{cfsFlags}', 'CfsFlagsController@show');
Route::post('cfsFlags','CfsFlagsController@cfsFlags');
Route::put('cfsFlags/{cfsFlags}','CfsFlagsController@update');
Route::delete('cfsFlags/{cfsFlags}', 'CfsFlagsController@delete');
