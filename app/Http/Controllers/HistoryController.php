<?php
namespace App\Http\Controllers;

use App\Models\History;
use App\Transformers\DateTransformer;

/**
 * Class HistoryController
 * @package App\Http\Controllers
 */
class HistoryController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$history    = History::all();
		$historyOut = app(DateTransformer::class)->transform($history);

		return \View::make('history.history',
		                   ['history' => $historyOut])->render();
	}

	public function show($id = null)
	{
		$history = isset($id) ? History::find($id) : null;

		$return = [
			'popup' => \View::make('history.add_edit_history_popup',
			                       isset($history) ? ['history' => $history] : []
			)->render(),
		];

		return \Response::json($return);
	}

	public function create()
	{
		dd('create');
	}

	/**
	 * @param $id
	 */
	public function remove($id)
	{
		History::destroy($id);

		return redirect('/history');

	}
}

