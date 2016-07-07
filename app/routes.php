<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|Auto: Juarez
|Arquivo de rotas da aplicação
*/

Route::get('/', [
'uses' =>'UserController@index',
'as' =>'user.login'
	]);

Route::get('/task', [
	'uses'=> 'TaskController@index',
	'as'=> 'task'
]);


/* Rota para CRUD de usuários */
Route::get('/user/register', function()
{
	return View::make('/user/register');
});


Route::post('/auth/login', [
	'uses' => 'UserController@edit',
	'as'=> 'user.edit'
	]);

Route::post('/auth/register',[
'uses' => 'UserController@create',
'as' => 'user.create'
	]);

Route::get('auth/edit/{id}','UserController@show');

Route::get('/user/delete/{id}', [
'uses' =>'UserController@destroy',
'as' =>'user.login'
	]);

Route::post('/auth/login',[
'uses' => 'UserController@postLogin',
'as' => 'user.login'
	]);


Route::get('/auth/logout', [
'uses' => 'UserController@getLogout',
'as' =>'user.logout'

	]);

/* Rotas para CRUD de  tarefas */

Route::post('/task/create',[
'uses' => 'TaskController@create',
'as' =>'task.create'
	]);

Route::get('/task/show/{id}', [
	'uses' => 'TaskController@show',
	'as' => 'task.show'
	]);

Route::get('/task/edit/{id}', [
	'uses' => 'TaskController@edit',
	'as' => 'task.edit'
	]);

Route::post('/task/edit' ,[
	'uses' => 'TaskController@update',
	'as' => 'task.update'	
	]);

Route::get('/task/delete/{id}' ,[
	'uses' => 'TaskController@destroy',
	'as' => 'task.delete'	
	]);