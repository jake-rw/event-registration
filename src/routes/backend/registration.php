<?php

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
