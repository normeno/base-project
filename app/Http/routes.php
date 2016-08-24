<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::group(['namespace' => 'Api', 'prefix' => 'api/v1'], function () {
    include_once 'Routes/Api/Site.php';
});

Route::group(['prefix' => 'admin'], function () {

    /*if (Gate::denies('admin-access')) {
        abort(403);
    }*/

    Route::get('/', [
        'uses' => 'HomeController@index'
    ]);
});