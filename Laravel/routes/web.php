<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/', function () {
//    return view('welcome');
//});

//  This is how you can insert dynamic parameters into the url
//Route::get('/users/{id}', function ($id) {
//    return 'This is user '.$id;
//});

//  This is how you can insert more than one dynamic parameter into the url
//Route::get('/users/{id}/{name}', function ($id, $name) {
//    return 'This is user '.$name.' with an id of '.$id;
//});



//Route::get('/','PagesController@index');
//Route::get('/services', 'PagesController@services');

//Route::get('/about', function () {
//    return view('pages.about');
//});


// Pages
//
// This route is necessary for the     public_html_2     folder to lock on to
// for the initial addressing of the application     then the individual views
// target the     pages.home     route underneath it
//
route::get('/', 'PagesController@home');
Route::get('pages.home', 'PagesController@home');


Route::get('pages.about', 'PagesController@about');
Route::get('pages.contact', 'PagesController@contact');
Route::get('pages.results', 'PagesController@results');

//  Search Hot Buttons
Route::get('stores.allStores', 'PagesController@storeNames');
Route::get('stores.storeAddresses', 'PagesController@storeAddresses');
Route::get('stores.storePhoneNumbers', 'PagesController@storePhoneNumbers');
Route::get('stores.allSites', 'PagesController@storeSites');
Route::get('stores.allCfsFlags', 'PagesController@storeCfsFlags');


// Stores Controller
Route::resource('stores', 'StoresController');
Route::get('stores.index', 'StoresController@index');
