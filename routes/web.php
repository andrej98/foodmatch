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

Route::middleware('auth')->group(function () {
    Route::get('/groups', '\App\Http\Controllers\GroupController@index')->name('groups.index');
    Route::get('/groups/create', '\App\Http\Controllers\GroupController@create')->name('groups.create');
    Route::get('/groups/join', '\App\Http\Controllers\GroupController@showJoin')->name('groups.showJoin');
    Route::post('/groups', '\App\Http\Controllers\GroupController@store')->name('groups.store');
    Route::get('/groups/{group}', '\App\Http\Controllers\GroupController@show')->name('groups.show');
    Route::post('/groups/join', '\App\Http\Controllers\GroupController@join')->name('groups.join');
    Route::delete('/groups/{group}/leave', '\App\Http\Controllers\GroupController@leave')->name('groups.leave');
});
Route::middleware('auth')->group(function () {
    Route::get('/preferences/create', '\App\Http\Controllers\PreferencesController@create')->name('preferences.create');
    Route::post('/preferences', '\App\Http\Controllers\PreferencesController@store')->name('preferences.store');
    Route::get('/preferences/{preference}/edit', '\App\Http\Controllers\PreferencesController@edit')->name('preferences.edit');
    Route::get('/preferences/{preference}', '\App\Http\Controllers\PreferencesController@show')->name('preferences.show');
});

Route::middleware('auth')->group(function () {
    Route::get('/restaurants/showOne', '\App\Http\Controllers\RestaurantController@showOne')->name('restaurants.showOne');
    Route::post('/restaurants/{restaurant}/reject', '\App\Http\Controllers\RestaurantController@reject')->name('restaurants.reject');
    Route::post('/restaurants/{restaurant}/like', '\App\Http\Controllers\RestaurantController@like')->name('restaurants.like');
    Route::get('/restaurants/{restaurant}', '\App\Http\Controllers\RestaurantController@read')->name('restaurants.read');
    Route::get('/restaurants/{restaurant}/review', '\App\Http\Controllers\RestaurantController@review')->name('restaurants.review');
    Route::post('/restaurants/{restaurant}/review', '\App\Http\Controllers\RestaurantController@submitReview')->name('restaurants.submitReview');

});
