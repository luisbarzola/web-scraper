<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/


Route::group(['prefix' => 'twitter', 'middleware' => ['source:twitter']], function () {
    Route::post('user/render/{user}', 'TwitterController@renderUser');
    Route::get('user/{user}', 'TwitterController@showUser');
});