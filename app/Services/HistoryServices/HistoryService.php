<?php
namespace App\Services\HistoryServices;

use App\Models\History;
use App\Transformers\DateTransformer;
use \Carbon\Carbon;

/**
 * Class HistoryService
 * @package App\Services\CalendarServices
 */
class HistoryService
{
	/**
	 * Получаем все новости
	 * 
	 * @return mixed
	 */
	public function getAllNews()
	{
		$history    = History::all()->sortBy('date');
		$historyOut = app(DateTransformer::class)->transform($history);

		return $historyOut;
	}

	/**
	 * Получаем конкретную новость
	 *
	 * @param null $id
	 *
	 * @return array
	 */
	public function getNews($id = null)
	{
		$history = isset($id) ? History::find($id) : null;

		$return = [
			'popup' => \View::make('history.add_edit_history_popup',
			                       isset($history) ? ['history' => $history] : [])->render(),
		];

		return $return;
	}

	/**
	 * Создание новости
	 *
	 * @param $data
	 *
	 * @return \Illuminate\Foundation\Application|mixed
	 */
	public function saveNews($data)
	{

		$history = app(History::class);
		$history->fill($data);
		$history->save();

		return $history;
	}

	/**
	 * Обновление новости
	 *
	 * @param $data
	 * @param $id
	 *
	 * @return mixed
	 */
	public function updateNews($data, $id)
	{
		$history = History::find($id);
		$history->fill($data);

		return \Response::json($history->update());
	}

	/**
	 * Удаление новости
	 * 
	 * @param $id
	 *
	 * @return int
	 */
	public function destroyNews($id)
	{
		return History::destroy($id);
	}
}