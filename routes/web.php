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
    Route::post('/groups', '\App\Http\Controllers\GroupController@store')->name('groups.store');
    Route::get('/groups/{group}', '\App\Http\Controllers\GroupController@show')->name('groups.show');
    Route::post('/groups/{group}/join', '\App\Http\Controllers\GroupController@join')->name('groups.join');
    Route::delete('/groups/{group}/leave', '\App\Http\Controllers\GroupController@leave')->name('groups.leave');
});
Route::middleware('auth')->group(function () {
    Route::get('/preferences/create', '\App\Http\Controllers\PreferencesController@create')->name('preferences.create');
    Route::post('/preferences', '\App\Http\Controllers\PreferencesController@store')->name('preferences.store');
    Route::get('/preferences/{preference}/edit', '\App\Http\Controllers\PreferencesController@edit')->name('preferences.edit');
    Route::post('/preferences/{preference}', '\App\Http\Controllers\PreferencesController@store')->name('preferences.update');
    Route::get('/preferences/{preference}', '\App\Http\Controllers\PreferencesController@show')->name('preferences.show');
});
