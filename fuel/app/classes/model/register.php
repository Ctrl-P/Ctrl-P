<?php

class Model_Register 
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
		$query = DB::select('*')->from('login_users');
		$query->having('user_id', $user_id);
		$query->and_having('password', $pswd);
		
		
		// Get the database connection
		$connection = Database_Connection::instance();
		
		// Get the sql query
		$sql = $query->compile($connection);
		
		return $sql;
	} 
	
	public static function register_new( $email,   $graduate, $gender, $dob, $country, $program) {
		 
		$user_id1 = explode('@', $email);
		$user_id = $user_id1[0];
		$user_id .= '@hec.edu';
		
		
		// prepare an insert statement
		$query = DB::insert('login_users')->set(array(
   
	
	'email' => $email,
	'user_id' => $user_id,
	'program' => $program,
	'graduate_date' => $graduate,
	'gender' => $gender,
	'dob' => $dob,
	'program' => $program
	

))
->execute();
		
		
	}
	
}
