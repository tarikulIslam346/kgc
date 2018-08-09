<?php



Route::get('/', 'PagesController@home');

Route::get('/admin','PagesController@admin');

Route::post('/store','AdminController@store')->name('login');

Route::get('/destroy','AdminController@destroy');

Route::get('/dashboard','AdminController@dashboard');

Route::get('/dashboard/{id}','AdminController@dashboard');




Route::post('/create_menu','AdminController@create_menu');

Route::get('/delete_menu/{id}','AdminController@delete_menu');

Route::post('/update_menu/{id}','AdminController@update_menu');

Route::post('/show_menu/{id}','AdminController@show_menu');
//Route::get ('/update_view','')


Route::post('/create_submenu','AdminController@create_submenu');

Route::post('/update_submenu/{id}','AdminController@update_submenu');


Route::post('/layout','AdminController@create_layout');
