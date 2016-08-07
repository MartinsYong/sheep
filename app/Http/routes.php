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

Route::get('/', function(){
	return redirect()->to('/login');
});

Route::get('/login', 'AccountController@getLogin');

Route::post('/login','AccountController@postLogin');

Route::get('/reg','AccountController@getSignup');

Route::post('/reg','AccountController@postSignup');

Route::get('/select',[
	'middleware' => 'auth',
	'uses' => 'AccountController@getSelect'
]);

Route::get('/logout','AccountController@logout');

Route::get('/forget', function () {
    return view('main.forget_pwd');
});

Route::get('/placeOrder',[
	'middleware' => 'auth',
	'uses' => 'OrderController@getPlaceOrder'
]);

Route::post('/placeOrder','OrderController@postPlaceOrder');

Route::get('/indexOrder',[
	'middleware' => 'auth',
	'uses' => 'OrderController@getIndexOrder'
]);

Route::get('/orders',[
	'middleware' => 'auth',
	'uses' => 'OrderController@getOrders'
]);

Route::post('/details','OrderController@getDetails');

Route::get('/history',[
	'middleware' => 'auth',
	'uses' => 'OrderController@getHistory'
]);

Route::get('/indexHistory',[
	'middleware' => 'auth',
	'uses' => 'OrderController@getIndexHistory'
]);