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

Route::get('/', function()
{
	return View::make('/user/login');
});

Route::get('/task', function()
{
	return View::make('/task/tasks');
});


/* Usuario rota */
Route::get('/user/register', function()
{
	return View::make('/user/register');
});

Route::post('/auth/register',[
'uses' => 'UserController@create',
'as' => 'user.create'
	]);


Route::post('/auth/login',[
'uses' => 'UserController@postLogin',
'as' => 'user.login'
	]);

Route::get('/user/logout', [
'uses' => 'UserController@getLogout',
'as' =>'user.logout'

	]);