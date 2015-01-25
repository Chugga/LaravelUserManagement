<?php

class ClSubsectionTemplate extends \Eloquent {

	// Add your validation rules here
	public static $rules = [
		// 'title' => 'required'
	];

	// Don't forget to fill this array
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function cl_section_template() {
        $this->belongsTo('ClSectionTemplate');
    }

    public function cl_question_templates() {
        $this->hasMany('ClQuestionTemplate');
    }

    public function cl_subsections() {
        $this->hasMany('ClSubsection');
    }
}