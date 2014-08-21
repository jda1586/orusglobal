<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

// Rutas del sitio
Route::group(array('prefix' => '{lang?}', 'before' => 'lang'), function ($lang) {
    Route::get('/', array('as' => 'root', 'uses' => 'SiteController@index', 'lang' => $lang));
    // Rutas para login
    Route::group(array('before' => 'login_ready'), function () {
        Route::get('login', array('as' => 'site.login', 'uses' => 'LoginController@index'));
        Route::post('login', array('as' => 'site.login', 'uses' => 'LoginController@login'));
        Route::post('register', array('as' => 'orus.register', 'uses' => 'RegisterController@store'));
    });

    // Rutas para Orus
    Route::group(array('before' => 'auth'), function () {
        Route::get('logout', array('as' => 'logout', 'uses' => 'loginController@logout'));
        Route::get('dashboard', array('as' => 'orus.dashboard', 'uses' => 'DashboardController@index'));
    });
});