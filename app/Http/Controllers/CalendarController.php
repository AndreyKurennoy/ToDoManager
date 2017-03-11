<?php

namespace App\Http\Controllers;

use \MaddHatter\LaravelFullcalendar\Facades\Calendar as FacadeCalendar;
use MaddHatter\LaravelFullcalendar\Calendar;
use \Carbon\Carbon;

/**
 * Class CalendarController
 * @package App\Http\Controllers
 */
class CalendarController extends Controller
{
	/**
	 * Вывод календаря
	 * 
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function index()
	{
		$events = [];

		$events[] = Calendar::event("Day",
		                            true,
		                            new Carbon('2017-03-10'),
		                            new Carbon('2017-03-10'));

		$calendar = FacadeCalendar::addEvents($events)->setOptions([
			                                                     'firstday' => 1,
		                                                     ])->setCallbacks([]);

		return view('calendar', compact('calendar'));
	}
}

