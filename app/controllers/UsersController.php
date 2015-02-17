<?php

class UsersController extends \BaseController {

    public function __construct() {
        Assets::add(array('theme'));
    }

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return View::make('users.index')
            ->with('users', User::orderBy('last_name', 'asc')->get());
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('users.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
        $inputs = Input::all();
		$user = new User($inputs);

		if(empty($inputs['password']) || $inputs['password'] !== $inputs['confirm_password'] || !$user->save()) {
			return Redirect::back()
				->with('message_error', 'There was an error saving the user, please ensure all form inputs are filled in correctly')
				->withInput();
		} else {
			return Redirect::route('users.index')
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
        return View::make('users.show')
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
		return View::make('users.edit')
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

        $inputs = Input::all();

        if(empty($inputs['password']) || $inputs['password'] !== $inputs['confirm_password']) {
            unset($inputs['password']);
        }

		if(!$user->update($inputs)) {
			return Redirect::back()
				->with('message_error', 'There was an error saving the user, please ensure all form inputs are filled in correctly')
				->withInput();
		} else {
			return Redirect::route('users.index')
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
