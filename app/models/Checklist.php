<?php

class Checklist extends \Eloquent {

	// Add your validation rules here
	public static $rules = [
		// 'title' => 'required'
	];

	// Don't forget to fill this array
	protected $guarded = ['id', 'created_at', 'updated_at'];

    public function checklist_template() {
        return $this->belongsTo('ChecklistTemplate');
    }

    public function cl_sections() {
        return $this->hasMany('ClSection');
    }
}