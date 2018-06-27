<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------

*/

Route::get('/', 'LandingController@index');
Route::get('/contact', 'LandingController@contact');
Route::post('/contact', 'LandingController@message');


Route::group(['middleware' => ['auth', 'checkStatus', 'isAdmin']], function () {

	Route::resource('tilesets', 'TilesetController');
	Route::patch('/preview/tilesets', 'TilesetController@preview');

	Route::resource('users', 'UserController');
	Route::resource('groups', 'TeamController');

	Route::get('app/settings', 'SettingController@index');
	Route::post('app/settings/update', 'SettingController@update');

	Route::resource('categories', 'CategoryController');


});

Route::group(['middleware' => ['auth', 'checkStatus']], function () {

	Route::get('/language/{lang}', 'LanguageController@index');

	Route::redirect('/home', '/dashboard', 301);
	Route::get('dashboard', 'DashboardController@index');

	Route::resource('maps', 'MapController')->except(['edit']);
	Route::get('/maps/{id}/edit', 'MapController@edit')->middleware('isOwner')->name('edit_map');


	Route::get('/favorites', 'FavoriteController@index');
	Route::get('/favorite/{id}', 'FavoriteController@favorite');
	
	Route::resource('datasets', 'DatasetController')->except(['edit']);
	Route::get('/datasets/{id}/edit', 'DatasetController@edit')->middleware('isOwner')->name('edit_dataset');

	Route::resource('styles', 'StyleController');

	Route::get('table/{id}', 'DatasetController@table');
	Route::post('table/edit', 'DatasetController@tableedit');
	Route::get('table/rec/delete/{value}', 'DatasetController@tabledelete');

	Route::resource('posts', 'PostController')->except(['edit']);
	Route::get('/posts/{id}/edit', 'PostController@edit')->middleware('isOwner')->name('edit_post');

	Route::get('tags', 'TagController@index');
	Route::post('get/tags', 'TagController@tags');

	Route::get('trash', 'TrashController@index');
	Route::get('restore/{type}/{id}', 'TrashController@restore');
	Route::get('delete/{type}/{id}', 'TrashController@delete');
	Route::post('selected/trash/submit', 'TrashController@selected_trash');

	Route::get('authors', 'AuthorController@index');
	Route::get('/authors/{id}', 'AuthorController@show');

});

Route::get('logout', 'Auth\LoginController@logout');

Route::get('/redirect', 'SocialAuthController@redirect');
Route::get('/callback', 'SocialAuthController@callback');

Route::get('/redirect/google', 'SocialAuthController@google')->name('social.redirect');
Route::get('/callback/google', 'SocialAuthController@callbackGoogle');