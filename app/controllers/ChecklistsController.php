<?php

class ChecklistsController extends \BaseController {

	/**
	 * Display a listing of checklists
	 *
	 * @return Response
	 */
	public function index()
	{
		$checklists = Checklist::all();

		return View::make('checklists.index', compact('checklists'));
	}

	/**
	 * Show the form for creating a new checklist
	 *
	 * @return Response
	 */
	public function create()
	{
        $checklist_template = ChecklistTemplate::with('cl_section_templates.cl_subsection_templates')->find(1);

		return View::make('checklists.create')
            ->with('checklist_template', $checklist_template)
            ->with('clients', Client::lists('name', 'id'));
	}

	/**
	 * Store a newly created checklist in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Checklist::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		Checklist::create($data);

		return Redirect::route('checklists.index');
	}

	/**
	 * Display the specified checklist.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$checklist = Checklist::findOrFail($id);

		return View::make('checklists.show', compact('checklist'));
	}

	/**
	 * Show the form for editing the specified checklist.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$checklist = Checklist::find($id);

		return View::make('checklists.edit', compact('checklist'));
	}

	/**
	 * Update the specified checklist in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$checklist = Checklist::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Checklist::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$checklist->update($data);

		return Redirect::route('checklists.index');
	}

	/**
	 * Remove the specified checklist from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Checklist::destroy($id);

		return Redirect::route('checklists.index');
	}

}
