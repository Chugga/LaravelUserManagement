<?php

class ClSection extends \Eloquent {

	// Add your validation rules here
	public static $rules = [
		// 'title' => 'required'
	];

	// Don't forget to fill this array
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function checklist() {
        $this->belongsTo('Checklist');
    }

    public function cl_section_template() {
        $this->belongsTo('ClSectionTemplate');
    }

    public function cl_subsections() {
        $this->hasMany('ClSubsection');
    }
}