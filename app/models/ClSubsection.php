<?php

class ClSubsection extends \Eloquent {

	// Add your validation rules here
	public static $rules = [
		// 'title' => 'required'
	];

	// Don't forget to fill this array
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function subsection_template() {
        return $this->belongsTo('SubsectionTemplate');
    }

    public function cl_section() {
        return $this->belongsTo('ClSection');
    }

    public function cl_questions() {
        return $this->hasMany('ClQuestion');
    }
}