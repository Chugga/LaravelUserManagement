<?php

class ClSectionTemplate extends \Eloquent {

	// Add your validation rules here
	public static $rules = [
		// 'title' => 'required'
	];

	// Don't forget to fill this array
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function checklist_template() {
        $this->belongsTo('ChecklistTemplate');
    }

    public function cl_subsection_templates() {
        $this->hasMany('ClSubsectionTemplate');
    }

    public function cl_sections() {
        $this->hasMany('ClSection');
    }
}