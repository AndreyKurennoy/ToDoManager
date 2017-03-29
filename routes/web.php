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
Route::get('/social_login/{provider}', 'SocialController@login');
Route::get('/social_login/callback/{provider}', 'SocialController@callback');


Route::group(['middleware' => 'auth'],
	function()
	{
		Route::resource('calendar', 'CalendarController');
		Route::post('calendar/get-all-events', 'CalendarController@getCalendarEvents');
	}
);

Route::group(['middleware' => 'admin'],
	function()
	{
		Route::get('history/remove/{id}', 'HistoryController@remove');
		Route::get('history/{id}', 'HistoryController@show');
//		Route::post('history/{id}', 'HistoryController@edit');
		Route::resource('history', 'HistoryController');
//		Route::resource('admin', 'AdminController'); // на будущее
	}
);

Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index');
Route::get('history', 'HistoryController@index');

Route::resource('category', 'CategoryController');