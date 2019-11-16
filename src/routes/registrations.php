<?php

// contacts
Route::prefix('registrations')->group(function() {
	Route::get('/', 'RegisterController@index')->name('index.registration')->middleware('can:view-admin');
	Route::get('edit/{id}', 'RegisterController@edit')->name('view.registration')->middleware('can:view-admin');
	Route::post('store', 'RegisterController@store')->name('addRegistration')->middleware('can:view-admin');
	Route::get('create', 'RegisterController@create')->middleware('can:view-admin');
	Route::post('update', 'RegisterController@update')->name('editRegistration')->middleware('can:view-admin');
	Route::get('delete/{id}', 'RegisterController@delete')->middleware('can:view-admin');
	Route::get('export', 'RegisterController@export')->middleware('can:view-admin');
});