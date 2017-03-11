<?php

namespace App\Http\Controllers;

use MaddHatter\LaravelFullcalendar\Calendar;

class CalendarController extends Controller
{
    public function index()
    {
//        $events = [];
//
//        $events[] = Calendar::event(
//            'Event One', //event title
//            false, //full day event?
//            '2015-02-11T0800', //start time (you can also use Carbon instead of DateTime)
//            '2015-02-12T0800', //end time (you can also use Carbon instead of DateTime)
//            0 //optionally, you can specify an event ID
//        );


        $events[] = Calendar::event( "Valentine's Day", //event title
        true, //full day event?
        '2015-02-14', //start time, must be a DateTime object or valid DateTime format (http://bit.ly/1z7QWbg)
        '2015-02-14', //end time, must be a DateTime object or valid DateTime format (http://bit.ly/1z7QWbg),
        1, //optional event ID
        [
            'url' => 'http://full-calendar.io'
        ]
        );




//        $calendar = Calendar::addEvents($events) //Согласно документации вызов должен происходить статически
//                            ->setOptions([
//                                'firstday' => 1
//                            ])->setCallbacks([]);
        return view('calendar', compact('calendar'));
    }
}

