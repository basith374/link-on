<?php namespace App;

use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;
use Illuminate\Database\Eloquent\Model;

class Subject extends  Model implements  SluggableInterface  {

    use SluggableTrait;


    protected $sluggable = array(
        'build_from' => 'title',
    );

    protected $guarded = [];

	public function courses()
	{
		return $this->belongsToMany('App\Course');
	}

}
