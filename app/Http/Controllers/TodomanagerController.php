<?php
namespace App\Http\Controllers;

use App\Http\Requests\TodomanagerRequest;
use App\Services\TodoManagerServices\TodoManagerService;

/**
 * Контроллер для работы с tod0-manager
 *
 * Class TodomanagerController
 * @package App\Http\Controllers
 */
class TodomanagerController extends Controller
{
	/**
	 * Сервис задач
	 * @var TodoManagerService
	 */
	public $todoManagerService;

	/**
	 * TodomanagerController constructor.
	 *
	 * @param TodoManagerService $todoManagerService
	 */
	public function __construct(TodoManagerService $todoManagerService)
	{
		$this->todoManagerService = $todoManagerService;
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
		$calendar = $this->todoManagerService->getCalendarEvent();
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
	public function store(TodomanagerRequest $request)
	{
		$save = $this->todoManagerService->saveTask($request->all());

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
		$task = $this->todoManagerService->findTask($id);
		
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
	public function update(TodomanagerRequest $request, $id)
	{
		$task = $this->todoManagerService->updateTask($id, $request->all());

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
		return $this->todoManagerService->destroyTask($id);
	}
}
