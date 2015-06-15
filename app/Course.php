<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;

class Course extends Model implements SluggableInterface{

    use SluggableTrait;

	protected $guarded = [];

    protected $sluggable = array(
        'build_from' => 'title',
    );

	public function subjects()
	{
		return $this->belongsToMany('App\Subject');
	}
	
	public function cost()
	{
		return $this->subjects->sum('cost');
	}

}