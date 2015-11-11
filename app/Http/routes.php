<?php

	// https://github.com/Studio-42/elFinder - File Manager

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
	Route::get('cms/settings', 'Cms\SettingsController@index');
	//Route::get('cms/settings/content', 'Cms\SettingsContentController@index');
	//Route::get('cms/settings/content/update/', 'Cms\SettingsContentController@update');

	Route::resource('cms/settings/general', 'Cms\SettingsGeneralController');

	Route::resource('cms/layout', 'Cms\LayoutController');
	Route::resource('cms/page', 'Cms\PageController');
	Route::resource('cms/blog/category', 'Cms\CategoryController');
	Route::resource('cms/blog', 'Cms\BlogPostController');
	Route::resource('cms/user', 'Cms\UserController');


	// Password reset link request routes...
	Route::get('cms/auth/password/email', 'Cms\Auth\PasswordController@getEmail');
	Route::post('cms/auth/password/email', 'Cms\Auth\PasswordController@postEmail');

	// Password reset routes...
	Route::get('cms/auth/password/reset/{token}', 'Cms\Auth\PasswordController@getReset');
	Route::post('cms/auth/password/reset', 'Cms\Auth\PasswordController@postReset');

	// Password reset routes...
	Route::get('cms/auth/login', 'Cms\Auth\AuthController@getLogin');
	Route::post('cms/auth/login', 'Cms\Auth\AuthController@postLogin');
	Route::get('cms/auth/logout', 'Cms\Auth\AuthController@getLogout');

	// Dashboard Routes
	Route::get('cms', 'Cms\DashboardController@index');
	Route::get('cms/dashboard', 'Cms\DashboardController@index');



	// Route::controller('cms/', 'Cms\Auth\AuthController');

	// Authentication routes...
	//Route::get('cms/auth/login', 'Cms\Auth\AuthController@getLogin');
	//Route::post('cms/auth/login', 'Cms\Auth\AuthController@postLogin');
	//Route::get('cms/auth/logout', 'Cms\Auth\AuthController@getLogout');

	// Registration routes...
	//Route::get('cms/auth/register', 'Cms\Auth\AuthController@getRegister');
	//Route::post('cms/auth/register', 'Cms\Auth\AuthController@postRegister');

	// Route::get('/blog/{slug}',['as' => 'blogPost', 'uses' => 'BlogPostPageController@show'])->where('slug', '[A-Za-z0-9-_]+');


	// Application routes
	//Route::group( function()
	//{
	Route::get('/', ['as' => 'root', 'uses' => 'HomePageController@index']);
	//Route::get('article/{article}',  ['as' => 'article', 'uses' => 'ArticleController@index']);
	Route::get('/blog/{slug}',  ['as' => 'blogPost', 'uses' => 'HomePageController@blog']);
	Route::get('/blog/',  ['as' => 'blogPostListing', 'uses' => 'HomePageController@blogListing']);

	Route::get('/{page}',  ['as' => 'page', 'uses' => 'HomePageController@page']);

	//Route::get('category/{category}',  ['as' => 'category', 'uses' => 'CategoryController@index']);
	//Route::post('language/change', ['as' => 'app.language.change' , 'uses' => 'LanguageController@postChange']);
	//});


	// Need to figure out how to register this component
	Form::macro('editor', function($name, $value = null, $options = array()) {

		// We will get the appropriate value for the given field. We will look for the
		// value in the session for the value in the old input data then we'll look
		// in the model instance if one is set. Otherwise we will just use empty.
		$id = 'editor';

		// Once we have the type, value, and ID we can merge them into the rest of the
		// attributes array so we can convert them into their HTML attribute format
		// when creating the HTML element. Then, we will return the entire input.
		//$merge = compact('value','id');
		$merge = compact('id');

		$options = array_merge($options, $merge);

		return '<div'.$this->html->attributes($options).'>'.$value.'</div>';


		//return '<div id="editor">'.$content.'</div>';
	});

	Event::listen('illuminate.query', function($query) {
		//var_dump($query);
	});