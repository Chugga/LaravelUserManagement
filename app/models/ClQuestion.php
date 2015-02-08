<?php

class ClQuestion extends \Eloquent {

	// Add your validation rules here
	public static $rules = [
		// 'title' => 'required'
	];

	// Don't forget to fill this array
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function cl_question_template() {
        return $this->belongsTo('ClQuestionTemplate');
    }

    public function cl_subsection() {
        return $this->belongsTo('ClSubsection');
    }

    public function question_images() {
        return $this->hasMany('QuestionImage');
    }
}