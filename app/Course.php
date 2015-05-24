<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model {

	protected $guarded = [];

	public function subjects()
	{
		return $this->belongsToMany('App\Subject');
	}

}
