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

Route::post('/add_menu_img','AdminController@add_menu_img');

Route::post('/add_description','AdminController@add_description');



Route::post('/create_submenu','AdminController@create_submenu');

Route::post('/update_submenu/{id}','AdminController@update_submenu');

Route::get('/delete_submenu/{id}','AdminController@delete_submenu');


Route::post('/layout','AdminController@create_layout');




Route::post('/nav','AdminController@create_navigation');

Route::get('/nav/{id}/{name}','AdminController@show_navigation');

Route::get('/navigation/{name}/{id}/{menu}','LayoutController@show_pages');




Route::post('/heigher/{id}','LayoutController@store_heighercommitee');

Route::post('/image/{id}','LayoutController@store_images');

Route::post('/text/{id}','LayoutController@store_text');


Route::get('/layout','LayoutController@create_layout');



//schedule routing

Route::post('/schedule','AdminController@schedule_store');

Route::post('/update_tournament/{id}','AdminController@update_tournament');

Route::post('/update_winner/{id}','AdminController@update_winner');

Route::post('/update_prize/{id}','AdminController@update_prize');



Route::get('/schedule','ScheduleController@index');

Route::get('/schedule_search','ScheduleController@search');

Route::get('/schedule_date_range/{id}','ScheduleController@schedule_date_range');


Route::get('/{id}/schedule/details','ScheduleController@delete_schedule_details');

Route::post('/schedule_details','ScheduleController@details_store');

Route::get('/schedule/{id}','ScheduleController@show_details');

Route::get('/delete_schedule/{id}','ScheduleController@delete_schedule');

Route::post('/create_notice','AdminController@store_notice');

Route::get('/delete_notice/{id}','AdminController@delete_notice');


//galary Routing


Route::post('/create_button','GalaryController@store_button');

Route::post('/create_vedio','GalaryController@store_vedio');

Route::post('/create_image','GalaryController@store_images');

Route::get('/delete_galary_btn/{id}','GalaryController@delete_button');

Route::get('/delete_galary_vedio/{id}','GalaryController@delete_vedio');

Route::get('/delete_galary_img/{id}','GalaryController@delete_img');

Route::get('/galary','GalaryController@index');

//home page edit 
Route::post('/change_online_service','AdminController@store_online_service');

Route::get('/delete_online_content/{id}','AdminController@delete_online_content');

Route::post('/create_home_button','AdminController@store_home_button');

Route::get('/delete_home_button/{id}','AdminController@delete_home_button');



