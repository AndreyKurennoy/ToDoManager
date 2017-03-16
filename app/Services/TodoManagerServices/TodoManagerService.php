<?php
namespace App\Services\TodoManagerServices;
use App\Models\Task;
use \MaddHatter\LaravelFullcalendar\Facades\Calendar as FacadeCalendar;
use MaddHatter\LaravelFullcalendar\Calendar;
use \Carbon\Carbon;

/**
 * Created by PhpStorm.
 * User: moga
 * Date: 10.03.17
 * Time: 14:40
 */
class TodoManagerService
{
	/**
	 * Будет получать все таски из БД
	 * 
	 * @return int
	 */
	public function getTasks()
	{
		return Task::all();
	}

	/**
	 *
	 * @return mixed
	 */
	public function getCalendarEvent()
	{
		$events = [];

		$tasks = $this->getTasks();

		foreach($tasks as $task) {
			$events[] = [
				'id'     => $task->id,
				'title'  => $task->title,
				'start'  => $task->date,
				'end'    => $task->date,
				'allDay' => true,
				'status' => $task->status,
			];
		}

		return $events;
	}

	public function saveTask($data)
	{
		$task = app(Task::class);
		$task->fill($data);
		$task->save();
		return $task;
	}

	public function findTask($id)
	{
		return Task::find($id);
	}

	public function updateTask($id, $data)
	{
		$task = $this->findTask($id);
		$task->fill($data);
		$task->save();

		return $task;
	}
}