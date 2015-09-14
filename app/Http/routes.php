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
    return "TODo";
});

Route::get('contact', 'PagesController@contact');


Route::resource('cms/blog', 'Cms\BlogPostController');
Route::resource('cms/user', 'Cms\UserController');


Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);

Route::get('cms','Cms\DashboardController@index');
Route::get('cms/dashboard','Cms\DashboardController@index');



// Route::controller('cms/', 'Cms\Auth\AuthController');

// Authentication routes...
//Route::get('cms/auth/login', 'Cms\Auth\AuthController@getLogin');
//Route::post('cms/auth/login', 'Cms\Auth\AuthController@postLogin');
//Route::get('cms/auth/logout', 'Cms\Auth\AuthController@getLogout');

// Registration routes...
//Route::get('cms/auth/register', 'Cms\Auth\AuthController@getRegister');
//Route::post('cms/auth/register', 'Cms\Auth\AuthController@postRegister');