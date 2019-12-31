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

Route::get('/', function () {
    return view('welcome');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('api/city','CityController@index');//afficher les donnees en format json
Route::get('api/city/creat','CityController@creat');//route pour remplir db
Route::post('api/city','CityController@store');
Route::get('api/city/{id}/edit','CityController@edit');
Route::put('api/city/{id}','CityController@update');
Route::delete('api/city/{id}','CityController@destroy');
Route::get('api/city/attach','CityController@attach');//attacher City et Time
Route::get('api/city/{id}/delivery-times','CityController@getCityTime');//attacher City et Time par City_Id
Route::get('api/city/{city_id}/delivery-dates-times/{number_of_days_to_get}','CityController@deliveryDatesTimes');//route pour remplir db date


Route::get('api/delivery-times','TimeController@index');//afficher les donnees en format json
Route::get('api/delivery-times/creat','TimeController@creat');//route pour remplir db time
Route::post('api/delivery-times','TimeController@store');
Route::get('api/delivery-times/{id}/edit','TimeController@edite');
Route::put('api/delivery-times/{id}','TimeController@update');
Route::delete('api/delivery-times/{id}','TimeController@destroy');




Route::get('api/city/delivery-dates-times','DateController@creat');//route pour remplir db date
