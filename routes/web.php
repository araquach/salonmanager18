<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::auth();

Route::get('/', 'HomeController@index');
Route::get('/admin', 'AdminHomeController@index');


// Holiday Routes

Route::get('/holiday/index/{category?}', 'HolidayController@index' );
Route::get('/holiday/create', 'HolidayController@create');
Route::post('/holiday/create', 'HolidayController@store');
Route::get('/holiday/view/{holiday}', 'HolidayController@show' );
Route::get('/holiday/{holiday}/edit', 'HolidayController@edit');
Route::patch('/holiday/{holiday}', 'HolidayController@update');

// need destroy routes

// Holiday Admin Routes

Route::get('admin/holiday/index/{category?}', 'AdminHolidayController@index' );
Route::get('admin/holiday/create', 'AdminHolidayController@create');
Route::post('admin/holiday/create', 'AdminHolidayController@store');
Route::get('admin/holiday/view/{holiday}', 'AdminHolidayController@show' );
Route::get('admin/holiday/{holiday}/edit', 'AdminHolidayController@edit');
Route::patch('admin/holiday/{holiday}', 'AdminHolidayController@update');
Route::patch('admin/holiday/{holiday}', 'AdminHolidayController@authorise');
// need destroy routes

// LieuHour Routes

Route::get('/lieu/index/{category?}', 'LieuHourController@index' );
Route::get('/lieu/create', 'LieuHourController@create');
Route::post('/lieu/create', 'LieuHourController@store');
Route::get('/lieu/view/{lieuHour}', 'LieuHourController@show' );
Route::get('/lieu/{lieuHour}/edit', 'LieuHourController@edit');
Route::patch('/lieu/{lieuHour}', 'LieuHourController@update');
// need destroy routes

// LieuHour Admin Routes

Route::get('admin/lieu/index/{category?}', 'AdminLieuHourController@index' );
Route::get('admin/lieu/create', 'AdminLieuHourController@create');
Route::post('admin/lieu/create', 'AdminLieuHourController@store');
Route::get('admin/lieu/view/{lieuHour}', 'AdminLieuHourController@show' );
Route::get('admin/lieu/{lieuHour}/edit', 'AdminLieuHourController@edit');
Route::patch('admin/lieu/{lieuHour}', 'AdminLieuHourController@update');
Route::patch('admin/lieu/{lieuHour}', 'AdminLieuHourController@authorise');
// need destroy routes

// SickDay Routes

Route::get('/sick/index/{category?}', 'SickDayController@index' );
Route::get('/sick/view/{sickDay}', 'SickDayController@show' );
// need destroy routes

// SickDay Admin Routes

Route::get('admin/sick/index/{category?}', 'AdminSickDayController@index' );
Route::get('admin/sick/create', 'AdminSickDayController@create');
Route::post('admin/sick/create', 'AdminSickDayController@store');
Route::get('admin/sick/view/{sickDay}', 'AdminSickDayController@show' );
Route::get('admin/sick/{sickDay}/edit', 'AdminSickDayController@edit');
Route::patch('admin/sick/{sickDay}', 'AdminSickDayController@update');
// need destroy routes

// FreeTime Routes

Route::get('/freetime/index/{category?}', 'FreeTimeController@index' );
Route::get('/freetime/create', 'FreeTimeController@create');
Route::post('/freetime/create', 'FreeTimeController@store');
Route::get('/freetime/view/{freeTime}', 'FreeTimeController@show' );
Route::get('/freetime/{freeTime}/edit', 'FreeTimeController@edit');
Route::patch('/freetime/{freeTime}', 'FreeTimeController@update');
// need destroy routes

// FreeTime Admin Routes

Route::get('admin/freetime/index/{category?}', 'AdminFreeTimeController@index' );
Route::get('admin/freetime/create', 'AdminFreeTimeController@create');
Route::post('admin/freetime/create', 'AdminFreeTimeController@store');
Route::get('admin/freetime/view/{freeTime}', 'AdminFreeTimeController@show' );
Route::get('admin/freetime/{freeTime}/edit', 'AdminFreeTimeController@edit');
Route::patch('admin/freetime/{freeTime}', 'AdminFreeTimeController@update');
Route::patch('admin/freetime/{freeTime}', 'AdminFreeTimeController@authorise');
// need destroy routes

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
