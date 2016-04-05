<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/



/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/


Route::group(['middleware' => 'web'], function () {
	Route::get('/', '\Maiklez\MaikBlog\Http\Controllers\MaikBlogController@blogView');
	
	// Authentication Routes...
	Route::auth();

    Route::get('/home', 'HomeController@index');
    
    
    Route::group([ 'namespace' => 'Admin'], function()
    {
    	// Controllers Within The "App\Http\Controllers\Admin" Namespace
    
    	Route::group(['namespace' => 'User'], function() {
    		// Controllers Within The "App\Http\Controllers\Admin\User" Namespace
    		Route::resource('user', 'UserController', ['only' => [
    				'index', 'show','store', 'edit', 'update', 'destroy'
    		]]);
    		Route::post('user/{user}/update_pasword', 'UserController@updatePassword')->name('user.update_password');
    	});
    	
		Route::group(['namespace' => 'Ability'], function() {
    		
			Route::resource('ability', 'AbilityController', ['only' => [
					'index', 'store', 'edit', 'update', 'destroy'
			]]);
			
    		
    	});
    		
    });
    
    
    
});
