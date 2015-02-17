<?php

use \Carbon\Carbon;

class ChecklistsController extends \BaseController {

	/**
	 * Display a listing of checklists
	 *
	 * @return Response
	 */
	public function index()
	{
        Assets::add(array('theme', 'datatables'));
		$checklists = Checklist::with(array('client', 'user', 'cl_sections' => function($q) {
            $q->whereHas('cl_subsections', function($q) {
                $q->whereSubsectionNumber(0);
            })->with(array('cl_subsections' => function($q) {
                $q->whereSubsectionNumber(0);
            }));
        }))->get();

		return View::make('checklists.index')
            ->with('checklists', $checklists);
	}

	/**
	 * Show the form for creating a new checklist
	 *
	 * @return Response
	 */
	public function create()
	{
        Assets::add(array('theme','datepicker'));
        $checklist_template = ChecklistTemplate::whereId(1)->with('cl_section_templates.cl_subsection_templates')->first();
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
		$inputs = Input::all();
		$checklist = Checklist::create([
            'job_number' => $inputs['job_number'],
            'checklist_template_id' => $inputs['checklist_template_id'],
            'client_id' => $inputs['client'],
            'address' => $inputs['address'],
            'weather' => $inputs['weather'],
            'conducted_at' => strlen($inputs['conducted_at']) > 0 ? Carbon::parse($inputs['conducted_at']) : '',
            'user_id' => Auth::user()->id
        ]);

        $section_number = 0;
        $subsection_number = 0;
        foreach($inputs['subsections_number'] as $sec_key => $sec_val) {
            $section = ChecklistGenerator::section($checklist->id, $sec_key, $section_number);
            foreach($sec_val as $sub_key => $sub_val) {
                for($i = 0; $i < $sub_val; $i++ ) {
                    ChecklistGenerator::subsection($section->id, $sub_key, $subsection_number);
                    $subsection_number++;
                }
            }
            $section_number++;
        }

		return Redirect::route('cl_sections.edit');
	}

	/**
	 * Display the specified checklist.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
        Assets::add('theme');
		$checklist = Checklist::with(array('client', 'cl_sections.cl_section_template', 'cl_sections.cl_subsections.cl_subsection_template', 'cl_sections.cl_subsections.cl_questions' => function($q) {
            $q->where('cl_questions.pass', '=', false)
                ->with('cl_question_template', 'question_images');
        }))->findOrFail($id);
		return View::make('checklists.show')
            ->with('checklist', $checklist)
            ->with('i', 1);
	}

	/**
	 * Show the form for editing the specified checklist.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        Assets::add('theme');
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

    public function getPDF($id) {
        Assets::add('theme');
        $checklist = Checklist::with(array('client', 'cl_sections.cl_section_template', 'cl_sections.cl_subsections.cl_subsection_template', 'cl_sections.cl_subsections.cl_questions' => function($q) {
            $q->where('cl_questions.pass', '=', false)
                ->with('cl_question_template', 'question_images');
        }))->findOrFail($id);

        $pdf = PDF::loadView('checklists.pdf', ['checklist' => $checklist, 'i' => 1]);
        return $pdf->download('checklist - ' . $checklist->id . '.pdf');
    }

}
