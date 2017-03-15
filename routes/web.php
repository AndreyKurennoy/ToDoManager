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
Auth::routes();

Route::resource('todomanager', 'TodomanagerController');
Route::post('todomanager/get-all-events', 'TodomanagerController@getCalendarEvents');
Route::resource('calendar', 'CalendarController');




Route::get('/home', 'HomeController@index');
