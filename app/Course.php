<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model {

	protected $guarded = [];
	
	protected $hello = 'hi';

	public function subjects()
	{
		return $this->belongsToMany('App\Subject');
	}

}
