<?php

class ClQuestion extends \Eloquent {

	// Add your validation rules here
	public static $rules = [
		// 'title' => 'required'
	];

	// Don't forget to fill this array
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function cl_question_template() {
        $this->belongsTo('ClQuestionTemplate');
    }

    public function cl_subsection() {
        $this->belongsTo('ClSubsection');
    }

    public function question_images() {
        $this->hasMany('QuestionImage');
    }
}