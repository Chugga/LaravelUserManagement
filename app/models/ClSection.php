<?php

class ClSection extends \Eloquent {

	// Add your validation rules here
	public static $rules = [
		// 'title' => 'required'
	];

	// Don't forget to fill this array
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function checklist() {
        return $this->belongsTo('Checklist');
    }

    public function cl_section_template() {
        return $this->belongsTo('ClSectionTemplate');
    }

    public function cl_subsections() {
        return $this->hasMany('ClSubsection');
    }
}