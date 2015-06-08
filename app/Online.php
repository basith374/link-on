<?php namespace App;

use Session;
// use Sentry;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;

class Online extends Model {

	/*
	 *
	 */
	public $table = 'sessions';
	
	/*
	 *
	 */
	public $timestamps = false;
	
	/*
	 * Returns all the guest users.
	 *
	 * @param \Illuminate\Database\Eloquent\Builder $query
	 * @return \Illuminate\Database\Eloquent\Builder
	 */
	public function scopeGuests($query)
	{
		return $query->whereNull('user_id');
	}
	
	/*
	 * Returns all the registered users.
	 *
	 * @param \Illuminate\Database\Eloquent\Builder $query
	 * @return \Illuminate\Database\Eloquent\Builder
	 */
	public function scopeRegistered($query)
	{
		return $query->whereNotNull('user_id')->with('user');
	}
	
	/*
	 * Update the session of the current user.
	 *
	 * @param \Illuminate\Database\Eloquent\Builder $query
	 * @return \Illuminate\Database\Eloquent\Builder
	 */
	public function scopeUpdateCurrent($query)
	{
		// return $query->where('id', Session::getId())->update(array('user_id' => Sentry::check() ? Sentry::getUser()->id : null));
		return $query->where('id', Session::getId())->update(array('user_id' => Auth::check() ? Auth::user()->id : null));
	}
	
	/*
	 * Returns the user that belongs to this entry.
	 *
	 * @return \Cartalyst\Sentry\Users\EloquentUser
	 */
	public function user()
	{
		// return $this->belongsTo('Cartalyst\Sentry\Users\EloquentUser');
		return $this->belongsTo('App\User');
	}

}
