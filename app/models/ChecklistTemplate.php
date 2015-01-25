<?php

class ChecklistTemplate extends \Eloquent {

	// Add your validation rules here
	public static $rules = [
		// 'title' => 'required'
	];

	// Don't forget to fill this array
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function checklists() {
        $this->hasMany('Checklist');
    }

    public function cl_section_templates() {
        $this->hasMany('ClSectionTemplate');
    }
}