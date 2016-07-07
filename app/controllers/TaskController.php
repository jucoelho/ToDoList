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
		return View::make('task.tasks')
                        ->with('tasks', $task);
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
            $task->id_user = Input::get('id_user');
            $task->save();

        return Redirect::to('/task')->with('message', 'Tarefa adicionada com sucesso!');

    	}
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$task = Task::find($id);
		return View::make('task.taskShow')->with('task', $task);
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$task = Task::find($id);
		return View::make('task.taskEdit')->with('task', $task);
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @return Response
	 */
	public function update()
	{
		$task = Task::find(Input::get('id_task'));
		$task->title = Input::get('title');
		$task->description = Input::get('description');
		$task->status = Input::get('status');
		$task->initialDate = Input::get('initialDate');
		$task->endDate = Input::get('endDate');
		$task->save();
		return Redirect::to('/task')->with('message', 'Tarefa editada com sucesso !');
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$task = Task::find($id);
		$task->delete();
		return Redirect::to('/task')->with('message', 'Tarefa excluida com sucesso !');
	}


}
