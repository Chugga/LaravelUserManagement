<?php

class ClSectionsController extends \BaseController {

	/**
	 * Display a listing of clsections
	 *
	 * @return Response
	 */
	public function index()
	{
        Assets::add('theme');
		$clsections = Clsection::all();

		return View::make('clsections.index', compact('clsections'));
	}

	/**
	 * Show the form for creating a new clsection
	 *
	 * @return Response
	 */
	public function create()
	{
        Assets::add('theme');
		return View::make('clsections.create');
	}

	/**
	 * Store a newly created clsection in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Clsection::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		Clsection::create($data);

		return Redirect::route('clsections.index');
	}

	/**
	 * Display the specified clsection.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
        Assets::add('theme');
		$clsection = Clsection::findOrFail($id);

		return View::make('clsections.show', compact('clsection'));
	}

	/**
	 * Show the form for editing the specified clsection.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        Assets::add('theme');
		$clsection = Clsection::find($id);

		return View::make('clsections.edit', compact('clsection'));
	}

	/**
	 * Update the specified clsection in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$clsection = Clsection::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Clsection::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$clsection->update($data);

		return Redirect::route('clsections.index');
	}

	/**
	 * Remove the specified clsection from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Clsection::destroy($id);

		return Redirect::route('clsections.index');
	}

}
