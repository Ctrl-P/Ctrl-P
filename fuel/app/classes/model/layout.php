<?php

class Model_Layout 
{
	protected static $_properties = array(
		'id',
		'type',
		'type_id',
		'key', 
		'setting',
		'created_at',
		'updated_at',
		'name'
	);

	protected static $_observers = array(

	);

	public static function login($user_id, $pswd) {
		
		
		
		$user = DB::select()->from('login_users')->where('user_id', $user_id)->where('password', $pswd)->execute()->as_array();
		Session::set('userid', $user_id);
		Session::set('password', $pswd);
		//echo DB::last_query()."<br><pre>";
		//echo "<pre>";
		return $user;
		
		
	
	} 
	
	
}
