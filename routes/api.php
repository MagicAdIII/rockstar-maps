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

Route::get('games', 'APIController@games');

Route::group(['prefix' => 'maps/{game}'], function () {
    Route::get('markergroups', 'APIController@markerGroups');
    Route::get('markers', 'APIController@markers');
    Route::get('tree', 'APIController@tree');
});
