<?php


class UserController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return View::make('user/login');
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$validator = Validator::make(Input::all(), User::$rules);
		if ($validator->passes()) {
            $user = new User;
            $user->name = Input::get('name');
            $user->email = Input::get('email');
            $user->password = Hash::make(Input::get('password'));
            $user->save();
        return Redirect::to('/')->with('message', 'Conta cadastrada com sucesso!');

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
		$user = User::find($id);
		return View::make('user.resetUser')->with('user', $user);
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$user = User::find($id);
		$user->name = Input::get('name');
        $user->email = Input::get('email');
        $user->password = Hash::make(Input::get('password'));
        $user->save();
        return Redirect::to('/task')->with('message', 'Conta cadastrada com sucesso!');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$user = User::find($id);
		$user->delete();
		return Redirect::to('/')->with('message', 'Usuário excluido com sucesso !');
	}
  
  	public function postLogin()
    {
        if (Auth::attempt(array('email' => Input::get('email'), 'password' => Input::get('password')))) {
            $tasks = Task::all();
            return Redirect::to('/task');

        } 
        else {

            return Redirect::to('/')
                            ->with('message', 'Email/senha não econtrado(s) !')
                            ->withInput();
        }
    }

     public function getLogout() {
        Auth::logout();
        return Redirect::to('/');
    }


}
