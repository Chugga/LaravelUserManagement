<?php

class UserController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return View::make('user.index')
            ->with('users', User::orderBy('last_name', 'asc')->get());
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('user.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$user = new User(Input::all());

		if(!$user->save()) {
			Redirect::back()
				->with('message_error', 'There was an error saving the user, please ensure all form inputs are filled in correctly')
				->withInput();
		} else {
			Redirect::route('user.index')
				->with('message_success', 'User Created');
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
        return View::make('user.show')
            ->with('user', User::find($id));
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		return View::make('user.edit')
            ->with('user', User::find($id));
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$user = User::find($id);

		if(!$user->update(Input::all())) {
			Redirect::back()
				->with('message_error', 'There was an error saving the user, please ensure all form inputs are filled in correctly')
				->withInput();
		} else {
			Redirect::route('user.index')
				->with('message_success', 'User Updated');
		}
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		if(User::whereId($id)->delete()) {
            return Redirect::back()->with('message_success', 'User Deleted.');
        } else {
            return Redirect::back()->with('message_error', 'Unable to Delete User.');
        }
	}


}
