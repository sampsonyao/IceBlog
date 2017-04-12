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


Route::group(['middleware' => ['web']], function(){
/*
	//Authentication Routes
		Route::get('/auth/login', 'Auth\LoginController@getIndex');
		Route::post('/auth/login', 'Auth\LoginController@postLogin');
		Route::get('/auth/logout', 'Auth\LoginController@getLogout');

	//Registration Routes
		Route::get('/auth/register', 'Auth\RegisterController@getRegister');
		Route::post('/auth/login', 'Auth\RegisterController@postRegister');
*/
	//Categories Route


	//Blog Routes
		Route::get('/blog/{slug}', ['as' => 'blog.single', 'uses' => 'BlogController@getSingle'])->where('slug', '[\w\d\-\_]+');
		Route::get('/blog', ['uses' => 'BlogController@getIndex', 'as' => 'blog.index']);

	//Pages Routes
		Route::get('/contact', 'PagesController@getContact');
		Route::get('/about', 'PagesController@getAbout');
		Route::get('/', 'PagesController@getIndex');

	//Comments Routes
		Route::post('/comments/{post_id}', ['uses' => 'CommentController@store', 'as' => 'comments.store']);


	//Resource Routes
		Route::resource('categories', 'CategoryController',['except' => ['create']]);
		Route::resource('tags', 'TagController',['except' => ['create']]);
		Route::resource('post', 'PostController');
});



Auth::routes();

Route::get('/home', 'PagesController@getIndex');
