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

Route::get('/' ,[
    'as'=>'home',
    'uses'=>'pageController@login'
]);

Route::post('/userLogin','DBController@userLogin');

Route::get('/user',['as' => 'Home', 'uses'=> 'PageController@user']);

Route::get('/map','PageController@map');

