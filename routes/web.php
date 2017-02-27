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

Route::group(['middleware' => ['web']], function () 
{

	// registration routes
	Auth::routes();
	Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

	// categories
	Route::resource('categories', 'CategoryController', ['except' => ['create']]);
	Route::resource('tags', 'TagController', ['except' => ['create']]);

	// blog routes
	Route::get('blog/{slug}', ['uses' => 'BlogController@getSingle', 'as' => 'blog.single']);
	Route::get('blog', ['uses' => 'BlogController@getIndex', 'as' => 'blog.index']);
	Route::resource('posts', 'PostController');

	// page routes
	Route::get('/', 'PagesController@getIndex');
	Route::get('about', 'PagesController@getAbout');

	//applications routes
	Route::get('applications', 'PagesController@getApplications');
	Route::resource('applications', 'ApplicationController');
});

// ->where('slug', '[w\d\-\_]+')
