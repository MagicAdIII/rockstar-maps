<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Auth::routes();

Route::get('/', 'HomeController@index');

Route::get('maps/{game}', 'MapsController@showMap')->name('maps.index');

// @fixme ugly as fuck
Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => 'admin'], function () {

    Route::resource('roles', 'RoleController');
    Route::resource('users', 'UserController');
    Route::resource('games', 'GameController');

    Route::resource('maps/markers', 'MarkerController');
    Route::resource('maps/markergroups', 'MarkerGroupController');
});

