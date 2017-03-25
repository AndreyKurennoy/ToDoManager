<?php
namespace App\Services\CalendarServices;

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
class CalendarService
{
	/**
	 * Будет получать все таски из БД
	 *
	 * @return int
	 */
	public function getTasks()
	{
		return Task::where('user_id', \Auth::user()->id)->get();
	}

	/**
	 * Получение всех тасков и формирование для календаря
	 *
	 * @return mixed
	 */
	public function getCalendarEvent()
	{
		$events = [];

		$tasks = $this->getTasks();

		foreach($tasks as $task)
		{
			$events[] = [
				'id'     => $task->id,
				'title'  => $task->title,
				'start'  => $task->date,
				'end'    => $task->date,
				'allDay' => true,
				'status' => $task->status,
				'color'  => $task->date < Carbon::now()->format('Y-m-d') ? $task->status == 1 ? '#008000' : '#8B0000' : '#FF8C00',
			];
		}

		return $events;
	}

	/**
	 * Сохранение нового таска
	 *
	 * @param $data
	 *
	 * @return \Illuminate\Foundation\Application|mixed
	 */
	public function saveTask($data)
	{
		$task = app(Task::class);
		$task->fill($data);
		$task->user_id = \Auth::user()->id;
		$task->save();

		return $task;
	}

	/**
	 * Найти таск
	 *
	 * @param $id
	 *
	 * @return mixed
	 */
	public function findTask($id)
	{
		return Task::find($id);
	}

	/**
	 * Обновление тасков
	 *
	 * @param $id
	 * @param $data
	 *
	 * @return mixed
	 */
	public function updateTask($id, $data)
	{
		$task = $this->findTask($id);
		$task->fill($data);
		$task->save();

		return $task;
	}

	/**
	 * Удаление тасков
	 *
	 * @param $id
	 *
	 * @return int
	 */
	public function destroyTask($id)
	{
		return Task::destroy($id);
	}
}