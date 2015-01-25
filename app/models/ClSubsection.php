<?php

class ClSubsection extends \Eloquent {

	// Add your validation rules here
	public static $rules = [
		// 'title' => 'required'
	];

	// Don't forget to fill this array
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function subsection_template() {
        $this->belongsTo('SubsectionTemplate');
    }

    public function cl_section() {
        $this->belongsTo('ClSection');
    }

    public function cl_questions() {
        $this->hasMany('ClQuestion');
    }
}