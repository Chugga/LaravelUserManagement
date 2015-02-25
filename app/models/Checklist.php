<?php

class Checklist extends \Eloquent {

	// Add your validation rules here
	public static $rules = [
		// 'title' => 'required'
	];

    public $dates = ['conducted_at'];

	// Don't forget to fill this array
	protected $guarded = ['id', 'created_at', 'updated_at'];

    public function checklist_template() {
        return $this->belongsTo('ChecklistTemplate');
    }

    public function cl_sections() {
        return $this->hasMany('ClSection');
    }

    public function checklist_images() {
        return $this->hasMany('ChecklistImage');
    }

    public function client() {
        return $this->belongsTo('Client');
    }

    public function user() {
        return $this->belongsTo('User');
    }
}