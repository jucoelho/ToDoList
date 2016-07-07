<?php

class TaskController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$task = Task::all();
		return View::make('task.taks')
                        ->with('taks', $task);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$validator = Validator::make(Input::all(), Task::$rules);
		if ($validator->passes()) {
            $task = new Task;
            $task->title = Input::get('title');
            $task->description = Input::get('description');
            $task->status = Input::get('status');
            $task->initialDate = Input::get('initialDate');
            $task->endDate = Input::get('endDate');
            $task->save();
        return Redirect::to('/')->with('message', 'Tarefa adicionada com sucesso!');

    	}
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


}
