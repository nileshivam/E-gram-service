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

Route::get('login',['as'=>'login','uses'=>'MainController@login']);

Route::post('login',['as'=>'plogin','uses'=>'MainController@plogin']);

Route::get('btc',['as'=>'btc','uses'=>'MainController@btc']);

Route::get('temp',['as'=>'temp','uses'=>'MainController@temp']);


Route::group(['middleware'=>'Login'],function(){


	Route::get('getpdf',['as'=>'getpdf','uses'=>'MainController@getpdf']);

	Route::get('get/{id}',['as'=>'getdoc','uses'=>'MainController@getdoc']);

	Route::get('getc/{id}',['as'=>'getcp','uses'=>'MainController@getcp']);

	Route::get('logout',['as'=>'logout','uses'=>'MainController@logout']);

	Route::get('view/{id}', ['as'=>'vie','uses'=>'MainController@vie']);

	Route::get('/', ['as'=>'index','uses'=>'MainController@index']);

	Route::get('list/{pur?}', ['as'=>'list','uses'=>'MainController@list1']);

	Route::get('accept/{it}', ['as'=>'acc','uses'=>'MainController@acc']);

	Route::get('reject/{it}', ['as'=>'reg','uses'=>'MainController@reg']);

	Route::get('form', ['as'=>'form','uses'=>'MainController@form']);

	Route::post('form', ['as'=>'pform','uses'=>'MainController@pform']);

});

