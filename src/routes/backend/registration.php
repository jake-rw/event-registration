<?php

/*
/*
 * Backend Routes
 * Namespaces indicate folder structure
 */
// Route::group([
// 	'namespace' => 'JakeRw\EventRegistration\Http\Controllers\Backend', 
// 	'prefix' => 'admin', 
// 	'as' => 'admin.', 
// 	'middleware' => 'auth'
// ], function (){
 
 	
// 	Route::prefix('registrations')->group(function() {
// 		Route::get('/', 'RegisterController@index')->name('index.registration');
// 		Route::get('edit/{id}', 'RegisterController@edit')->name('view.registration');
// 		Route::post('store', 'RegisterController@store')->name('addRegistration');
// 		Route::get('create', 'RegisterController@create');
// 		Route::post('update', 'RegisterController@update')->name('editRegistration');
// 		Route::get('delete/{id}', 'RegisterController@delete');
// 		Route::get('export', 'RegisterController@export');
// 	});
// });




Route::prefix('admin')
	->name('admin.')
	->middleware(['web', 'auth'])
	->namespace('JakeRw\EventRegistration\Http\Controllers\Backend')
	->group(function () {
		
		Route::resource('registrations', 'RegisterController');
});

// Route::middleware(['web', 'auth'])
// 	->namespace('CorporateInnovations\Promocodes\Http\Controllers\FrontEnd')
// 	->group(function () {
		
// });


// Route::prefix('admin')
// 	->name('admin.')
// 	->middleware(['auth'])
// 	->namespace('JakeRw\EventRegistration\Http\Controllers\Backend')
// 	->group(function () {
		
// 		Route::get('/', 'RegisterController@index')->name('index.registration')->middleware('can:view-admin');
// 		Route::get('edit/{id}', 'RegisterController@edit')->name('view.registration')->middleware('can:view-admin');
// 		Route::post('store', 'RegisterController@store')->name('addRegistration')->middleware('can:view-admin');
// 		Route::get('create', 'RegisterController@create')->middleware('can:view-admin');
// 		Route::post('update', 'RegisterController@update')->name('editRegistration')->middleware('can:view-admin');
// 		Route::get('delete/{id}', 'RegisterController@delete')->middleware('can:view-admin');
// 		Route::get('export', 'RegisterController@export')->middleware('can:view-admin');
// });

// Route::middleware(['web', 'auth'])
// 	->namespace('JakeRw\EventRegistration\Http\Controllers\FrontEnd')
// 	->group(function () {
		
// });

	// Route::group(['namespace' => 'Backend', 'prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'auth'], function () 