<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
| Modified today
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::group(['middleware'=>'auth'], function (){
    Route::resource('productattribute','ProductAttributeController');
    Route::resource('brand','BrandController');
    Route::resource('productcategory','ProductCategoryController');
    Route::resource('munitsystem','MUnitSystemController');
    Route::resource('unitmultiplier','UnitMultiplierController');
    Route::resource('product','ProductController');
    Route::resource('productvariation','ProductVariationController');
    Route::resource('productgroup','ProductGroupController');
    Route::resource('productsubgroup','ProductSubGroupController');
    Route::get('productsubgroup/getSubGroups/{id}','ProductSubGroupController@getSubGroups');

    Route::resource('entity','EntityController');
    Route::resource('entitycategory','EntityCategoryController');
    Route::resource('neighborhood','NeighborhoodController');
    Route::resource('country','CountryController');
    Route::resource('state','StateController');
    Route::get('state/getStates/{id}','StateController@getStates');
    Route::resource('city','CityController');
    Route::get('city/getCities/{id}','CityController@getCities');
    Route::resource('postalcode','PostalCodeController');
    Route::get('postalcode/getPostalCodes/{id}','PostalCodeController@getPostalCodes');
});