<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/profile', 'UserController@profile')->name('users.profile');
Route::get('/profile/{id}', 'UserController@publicprofile')->name('users.public.profile');
Route::post('/profile', 'UserController@add_user_skills')->name('users.addskill');


Route::resource('skills', 'SkillController');


Route::prefix('goods')->group( function(){
	Route::get('create', 'GoodController@create')->name('goods.create');
	Route::post('/', 'GoodController@store')->name('goods.store');
	Route::get('/{id}', 'GoodController@show')->name('goods.show');
	Route::get('edit/{id}', 'GoodController@edit')->name('goods.edit');
	Route::post('/{id}', 'GoodController@update')->name('goods.update');
});	


Route::prefix('messages')->group( function(){
	Route::get('send/{id}', 'MessageController@send')->name('messages.send');
	Route::post('/{id}', 'MessageController@store')->name('messages.store');
	Route::get('/', 'MessageController@index')->name('messages.index');
	Route::get('view/{id}', 'MessageController@show')->name('messages.show');
});

Route::prefix('contracts')->group( function(){
	Route::get('create/{id}', 'ContractsController@create')->name('contracts.create');
	Route::get('edit/{id}', 'ContractsController@edit')->name('contracts.edit');
	Route::post('update/{id}', 'ContractsController@update')->name('contracts.update');
	Route::post('/{id}', 'ContractsController@store')->name('contracts.store');
	Route::get('approve/{id}', 'ContractsController@approve')->name('contracts.approve');
	Route::get('/{id}', 'ContractsController@show')->name('contracts.show');
	Route::get('/', 'ContractsController@index')->name('contracts.index');
	Route::get('complete/{id}', 'ContractsController@complete')->name('contracts.complete');


});

Route::prefix('reputation')->group( function(){
	Route::get('create/{id}', 'ReputationController@create')->name('reputation.create');
	Route::post('store/{id}', 'ReputationController@store')->name('reputation.store');
	Route::get('/{id}', 'ReputationController@show')->name('reputation.show');
	Route::get('/', 'ContractsController@index')->name('reputation.index');


});

Route::prefix('good_request')->group( function(){
	Route::get('create', 'GoodRequestController@create')->name('good_request.create');
	Route::post('store', 'GoodRequestController@store')->name('good_request.store');
	Route::get('/{id}', 'GoodRequestController@show')->name('good_request.show');
	Route::get('/', 'GoodRequestController@index')->name('good_request.index');
	Route::get('/{id}/edit', 'GoodRequestController@edit')->name('good_request.edit');
	Route::put('/{id}', 'GoodRequestController@update')->name('good_request.update');


});

Route::prefix('search')->group( function(){
	Route::get('/', 'SearchController@index')->name('search.index');
	Route::post('/', 'SearchController@search')->name('search.search');
	Route::get('/results', 'SearchController@results')->name('search.results');
});

Route::resource('skill_example', 'SkillExampleController');


