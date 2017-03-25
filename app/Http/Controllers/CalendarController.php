<?php
namespace App\Http\Controllers;

use App\Http\Requests\CalendarRequest;
use App\Services\CalendarServices\CalendarService;


/**
 * Class CalendarController
 * @package App\Http\Controllers
 */
class CalendarController extends Controller
{
	/**
	 * Сервис задач
	 * @var calendarService
	 */
	public $calendarService;

	/**
	 * CalendarController constructor.
	 *
	 * @param CalendarService $calendarService
	 */
	public function __construct(CalendarService $calendarService)
	{
		$this->calendarService = $calendarService;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		return view('calendar.calendar');
	}

	/**
	 * Метод для получения всех ивентов
	 *
	 * @return mixed
	 */
	public function getCalendarEvents()
	{
		$calendar = $this->calendarService->getCalendarEvent();
		return \Response::json(['calendar' => $calendar]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		$return = [
			'popup' => \View::make(
				'calendar.add_edit_task_popup', []
			)->render(),
		];

		return \Response::json($return);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request $request
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function store(CalendarRequest $request)
	{
		$save = $this->calendarService->saveTask($request->all());

		return \Response::json($save);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int $id
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		$task = $this->calendarService->findTask($id);

		$return = [
			'popup' => \View::make(
				'calendar.add_edit_task_popup',
				[
					'task' => $task,
				]
			)->render(),
		];

		return \Response::json($return);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int $id
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request $request
	 * @param  int                      $id
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function update(CalendarRequest $request, $id)
	{
		$task = $this->calendarService->updateTask($id, $request->all());

		return $task;
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int $id
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		return $this->calendarService->destroyTask($id);
	}
}

