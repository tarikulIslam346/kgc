<?php



Route::get('/', 'PagesController@home');

Route::get('/admin','PagesController@admin');

Route::post('/store','AdminController@store')->name('login');

Route::get('/destroy','AdminController@destroy');

Route::get('/dashboard','AdminController@dashboard');

Route::get('/dashboard/{id}','AdminController@dashboard');

Route::post('/create_menu','AdminController@create_menu');

Route::get('/delete_menu/{id}','AdminController@delete_menu');

//Route::get('/update_menu/{id}','AdminController@update_menu');
//Route::get ('/update_view','')
