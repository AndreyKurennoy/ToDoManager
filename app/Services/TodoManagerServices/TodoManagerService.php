<?php
namespace App\Services\TodoManagerServices;
use App\Models\Task;

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
}