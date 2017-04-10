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
Route::get('logout', 'Auth\LoginController@getLogout');


Route::group(['middleware' => 'auth'],
	function()
	{
		Route::resource('calendar', 'CalendarController');
		Route::post('calendar/get-all-events', 'CalendarController@getCalendarEvents');
        Route::resource('profile', 'ProfileController');
	}
);

Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index');

Route::resource('category', 'CategoryController');