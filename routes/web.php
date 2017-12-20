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
use Carbon\Carbon;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Routes for Share Purchase
Route::get('/sharepurchase','SharePurchaseController@index')->name('listSharePurchase');
Route::get('/sharepurchase/create','SharePurchaseController@create')->name('createSharePurchase');
Route::post('/sharepurchase','SharePurchaseController@store')->name('storeSharePurchase');
Route::get('/sharepurchase/{id}','SharePurchaseController@edit')->name('editSharePurchase');
Route::post('/sharepurchase/{id}','SharePurchaseController@update')->name('updateSharePurchase');
Route::delete('/sharepurchase/{id}','SharePurchaseController@destroy')->name('deleteSharePurchase');

//Routes for Account Settings
Route::get('/profile','UserEmailAddressesController@index')->name('listUserEmailAddress');
Route::get('/profile/create','UserEmailAddressesController@create')->name('createUserEmailAddress');
Route::post('/profile','UserEmailAddressesController@store')->name('storeUserEmailAddress');
Route::get('/profile/{id}','UserEmailAddressesController@edit')->name('editUserEmailAddress');
Route::post('/profile/{id}','UserEmailAddressesController@update')->name('updateUserEmailAddress');
Route::delete('/profile/{id}','UserEmailAddressesController@destroy')->name('deleteUserEmailAddress');