<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;

class Blog extends Model implements SluggableInterface {

	use SluggableTrait;
	
	protected $fillable = ['author', 'title', 'body'];
	
	protected $sluggable = array(
		'build_from'=> 'title',
		'save_to'	=> 'slug',
	);

	public function user() {
		return $this->belongsTo('App\User', 'author');
	}

}
