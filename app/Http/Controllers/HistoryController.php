<?php
namespace App\Http\Controllers;

use App\Models\History;
use App\Services\HistoryServices\HistoryService;
use App\Transformers\DateTransformer;
use Illuminate\Http\Request;

/**
 * Class HistoryController
 * @package App\Http\Controllers
 */
class HistoryController extends Controller
{
	/**
	 * @var HistoryService
	 */
	public $historyService;

	/**
	 * HistoryController constructor.
	 *
	 * @param HistoryService $historyService
	 */
	public function __construct(HistoryService $historyService)
	{
		$this->historyService = $historyService;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$historyOut = $this->historyService->getAllNews();
		
		return \View::make('history.history',
		                   ['history' => $historyOut])->render();
	}

	public function show($id = null)
	{
		$return = $this->historyService->getNews($id);

		return \Response::json($return);
	}

	/**
	 * @param Request $request
	 *
	 * @return mixed
	 */
	public function store(Request $request)
	{
		$return = $this->historyService->saveNews($request->all());
		
		return $return;
	}

	/**
	 * @param Request $request
	 * @param         $id
	 */
	public function update(Request $request, $id)
	{
		$return = $this->historyService->updateNews($request->all(), $id);

		return $return;
	}

	/**
	 * @param $id
	 *
	 * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
	 */
	public function remove($id)
	{
		$return = $this->historyService->destroyNews($id);

		return redirect('/history');
	}
}

