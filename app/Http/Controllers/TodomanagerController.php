<?php
namespace App\Http\Controllers;

use App\Services\TodoManagerServices\TodoManagerService;
use Illuminate\Http\Request;

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
    {   $this->middleware('auth');
        $this->todoManagerService = $todoManagerService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = $this->todoManagerService->getTasks();
        return view('todomanager', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
