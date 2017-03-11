<?php

namespace App\Http\Controllers;

use \MaddHatter\LaravelFullcalendar\Facades\Calendar;

class CalendarController extends Controller
{
	public function index()
	{
		$events = [];

		$events[] = Calendar::event("Valentine's Day",
		                            true,
		                            '2015-02-14',
		                            '2015-02-14',
		                            1,
		                            [
			                            'url' => 'http://full-calendar.io',
		                            ]);

		$calendar = Calendar::addEvents($events)->setOptions([
			                                                     'firstday' => 1,
		                                                     ])->setCallbacks([]);

		return view('calendar', compact('calendar'));
	}
}

