<?php
//require app_path('Http/routes.php'); // todo-Андрей: Зачем это нужно???
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
Route::resource('calendar', 'CalendarController');




Route::get('/home', 'HomeController@index');
