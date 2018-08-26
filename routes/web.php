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

Route::get('/delete_submenu/{id}','AdminController@delete_submenu');


Route::post('/layout','AdminController@create_layout');


Route::post('/nav','AdminController@create_navigation');

Route::get('/nav/{id}/{name}','AdminController@show_navigation');

Route::get('/navigation/{name}/{id}/{menu}','LayoutController@show_heighercommitee');




Route::post('/heigher/{id}','LayoutController@store_heighercommitee');

Route::post('/image/{id}','LayoutController@store_images');

Route::post('/text/{id}','LayoutController@store_text');



Route::post('/schedule','AdminController@schedule_store');

Route::post('/update_tournament/{id}','AdminController@update_tournament');

Route::post('/update_winner/{id}','AdminController@update_winner');

Route::post('/update_prize/{id}','AdminController@update_prize');



Route::get('/schedule','ScheduleController@index');

Route::get('/schedule_search','ScheduleController@search');

Route::get('/{id}/schedule/details','ScheduleController@delete_schedule_details');

Route::post('/schedule_details','ScheduleController@details_store');

Route::get('/schedule/{id}','ScheduleController@show_details');

Route::get('/delete_schedule/{id}','ScheduleController@delete_schedule');