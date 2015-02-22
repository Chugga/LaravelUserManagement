<?php

class ClSubsectionsController extends \BaseController {

	/**
	 * Display a listing of clsubsections
	 *
	 * @return Response
	 */
	public function index()
	{
		$clsubsections = Clsubsection::all();

		return View::make('clsubsections.index', compact('clsubsections'));
	}

	/**
	 * Show the form for creating a new clsubsection
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('clsubsections.create');
	}

	/**
	 * Store a newly created clsubsection in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), ClSubsection::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		ClSubsection::create($data);

		return Redirect::route('clsubsections.index');
	}

	/**
	 * Display the specified clsubsection.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$clsubsection = ClSubsection::findOrFail($id);

		return View::make('clsubsections.show', compact('clsubsection'));
	}

	/**
	 * Show the form for editing the specified clsubsection.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        Assets::add(array('theme','datepicker'));
        $checklist = Checklist::whereHas('cl_sections', function($q) use ($id) {
            $q->whereHas('cl_subsections', function($q) use ($id) {
                $q->whereId($id);
            });
        })
            ->with(array('cl_sections.cl_subsections.cl_subsection_template', 'cl_sections.cl_section_template'))
            ->first();

        $check_array = [];

        foreach($checklist->cl_sections as $section) {
            $check_array[$section->cl_section_template->name] = [];
            foreach($section->cl_subsections as $subsection) {
                $check_array[$section->cl_section_template->name][$subsection->id] = $subsection->cl_subsection_template->name;
            }
        }

		$clsubsection = ClSubsection::with('cl_subsection_template', 'cl_questions.cl_question_template')->whereId($id)->first();

		return View::make('cl_subsections.edit')
            ->with('checklist', $checklist)
            ->with('checklist_sections', $check_array)
            ->with('cl_subsection', $clsubsection);
	}

	/**
	 * Update the specified clsubsection in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$clsubsection = ClSubsection::with('cl_section.checklist')->findOrFail($id);
        $questions = Input::all()['question'];

        /*echo "<pre>";
        print_r(Input::all());
        echo "</pre>";
        exit;*/

        foreach($questions as $id => $question) {
            $question_mod = ClQuestion::find($id);
            $question_mod->pass = isset($question['pass']);
            if(!empty($question['answer'])) $question_mod->answer = $question['answer'];
            $question_mod->save();

            if(!empty($question['photo'])) {
                foreach($question['photo'] as $photo) {
                    $image = QuestionImage::create(array('cl_question_id' => $id));
                    $image->filename = $image->id . "." . $photo->getClientOriginalExtension();
                    $image->save();
                    $photo->move($_SERVER['DOCUMENT_ROOT'] . '/photos', $image->id . "." . $photo->getClientOriginalExtension());
                }
            }
        }
        $next_subsection = ClSubsection::whereSubsectionNumber($clsubsection->subsection_number+1)->first();
        if(isset($next_subsection)) {
            return Redirect::route('clsubsections.edit', $next_subsection->id);
        } else {
            return Redirect::route('checklists.show', $clsubsection->cl_section->checklist->id);
        }

	}

	/**
	 * Remove the specified clsubsection from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		ClSubsection::destroy($id);

		return Redirect::route('clsubsections.index');
	}

}
