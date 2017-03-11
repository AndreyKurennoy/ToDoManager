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

Route::resource('/', 'TodomanagerController');
Route::resource('todomanager', 'TodomanagerController');

Auth::routes();

Route::get('/home', 'HomeController@index');


Route::resource('calendar', 'CalendarController');