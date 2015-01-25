<?php

class ClQuestionTemplate extends \Eloquent {

	// Add your validation rules here
	public static $rules = [
		// 'title' => 'required'
	];

	// Don't forget to fill this array
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function cl_questions() {
        $this->hasMany('ClQuestion');
    }

    public function cl_subsection_template() {
        $this->belongsTo('ClSubsectionTemplate');
    }
}