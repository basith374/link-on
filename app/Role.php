<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model {

	protected $table = 'roles';
	
	public function users()
	{
		return $this->belongsToMany('App\User', 'user_role');
	}

    public function userlinks()
    {
        $data = array();
        foreach ($this->users as $key => $value) {
            $data[$key] = '<a href="/admin/profile/' . $value->id . '">' . $value->name . '</a>';
        }
        return $data;
    }

}
