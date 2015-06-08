<?php namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract {

	use Authenticatable, CanResetPassword, SoftDeletes;

	protected $dates = ['deleted_at'];
	
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['name', 'email', 'password'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = ['password', 'remember_token'];

	public function roles() {
		return $this->belongsToMany('App\Role', 'user_role');
	}
	
	public function blogs() {
		return $this->hasMany('App\Blog', 'author');
	}
	
	public function sessions() {
		return $this->hasMany('App\Online');
	}
	
	/*
	 * Under construction. more suitable for online status
	 *
	 */
	public function lastSeen() {
		if($this->sessions->last()) {
			return $this->sessions->last()->last_activity;
		} else {
			return 'No activity';
		}
	}
	
	/*
	 * Get online status from sessions table
	 *
	 */
	public function online() {
		if($this->sessions->last()) {
			return 'Yes';
		} else {
			return 'No';
		}
	}
	
	public function active() {
		if($this->trashed()) {
			return 'No';
		} else {
			// if(longtimenosee) {
				// return 'No';
			// } else {
				return 'Yes';
			// }
		}
	}
	
	public function scopeActive() {
		
	}

}
