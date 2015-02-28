<?php

class Model_User 
{
	protected static $_properties = array(
		'id',
		'type',
		'type_id',
		'key', 
		'setting',
		'created_at',
		'updated_at',
		'name',
		'balance',
			'program',
	);

	protected static $_observers = array(

	);
	
	public function resetDates()
	{
		$query = DB::select('*')->from('login_users')
		
		->as_assoc()
		->execute();
		$temp = array();
		
		
		for($i=0; $i < count($query); $i++)
		{
		$temp[] = $query[$i];
		
		}
		
		
		for($i=0; $i < count($temp); $i++)
		{
			
			if($temp[$i]['dob'] != "" && date("Y-m-d",strtotime($temp[$i]['dob'])) == "1969-12-31")
			{
				$query = DB::update('login_users');
				$query->value('dob', "" );
				$query->where(array('id' => $temp[$i]['id']));
				$query->execute();
			}
		}
	}

	public function addBalance($id, $amount)
	{
		$info = Model_User::get_info_id($id);
		
		
		
		
		$query = DB::update('login_users');
		$query->value('balance', ($info[0]['balance'] + $amount)  );
		$query->where(array('id' => $id));
		$query->execute();
	}
	
	public static function updateDOB($user_id, $dob)
	{
		$query = DB::update('login_users');
		if($dob!= "")
		$query->value('dob', $dob );
		else
			$query->value('dob', null );
		$query->where(array('user_id' => $user_id));
		$query->execute();
		
	}
	public function updateBalance($user_id, $pages)
	{
		// get current Bal:
		$info = Model_User::get_info($user_id);
		
		$query = DB::update('login_users');
		$query->value('balance', ( $info[0]['balance'] - $pages ) );
		$query->where(array('user_id' => $user_id));
		$query->execute();
		
	}
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
		$email = $user_id;
		
		$name = explode(".",$user_id1[0]);
		
		$validate_login = Model_User::authenticate($email);
		if(count($validate_login) == 0)
		{
		
		// prepare an insert statement
		$query = DB::insert('login_users')->set(array(
  
	'fname'=>$name[0],
	'lname'=>$name[1],
	'email' => $email,
	'user_id' => $user_id,
	
	'graduate_date' => $graduate,
	'gender' => $gender,
	'dob' => $dob,
	'country' => $country,
	'program' => $program,
	'balance' => '50',
	'reg_date' => date("Y-m-d"),
				
	

))
->execute();
		
		
		
		// Send Activation Email:
		$email = Email::forge();
		$email->from('noreply@ctrl-p.co', 'Ctrl+P');
		try
		{
		$email->to(array($user_id));
		}
		catch (\Exception $e)
		{
			die("<pre>error sending email ".print_r($e,true));
		}
		$email->subject('Welcome to Ctrl+P!');
		$email->body("
Hi {$name[0]},

Welcome to Ctrl+P Beta! We're excited to offer you a preview of our new web application!

For those of you unsure of what you just signed up for, Ctrl+P is a fast and free web app that allows you to print using your computer or mobile device, for free. 
Once you verify your account by clicking the link below, you will have access to the following features:

	•	Build your print queue!
		Upload any .docx, .pptx, or .pdf to easily build your print queue to as many files as you want
	•	Print on demand!
		Once you're ready, select 'print now' on any job - please keep in mind that your page balance is set at 50 free pages per month under this beta version
	•	Discover new opportunities!
		Find new deals, promotions and job offers through relevant advertisements placed on the bottom of each printed page
				
		
Please click here : http://hec.ncitsolutions.com/activate/?id=".md5($user_id). " to activate your account and get started. Thanks for being part of our early community - your participation and feedback will help us improve Ctrl+P to better suit your mobile printing needs so don't hesitate to get in touch with us!

Contact us at hello@ctrl-p.co							
				
Happy printing!

From the Ctrl+P Team
		");
		try
{
    $email->send();
}
catch(\EmailValidationFailedException $e)
{
    // The validation failed 
    die("valdiation failed");
}
catch(\EmailSendingFailedException $e)
{
    // The driver could not send the email
	die("could not send failed");
}
		
		
		return true;
		}
		else
		{
			return false;
		}
	}
	
	
	public function getAllAccounts()
	{
		$query = DB::select('*')->from('login_users')->as_assoc()
		->execute();
		
		return $query;
	}
	
	public function getAccountPrints($account)
	{
		$query = DB::select('*')->from('file_queue')
		->where(array('user_name' => $account , 'printed' => 1))
		->as_assoc()
		->execute();
		
		return $query;
	}
	
	public function getAds()
	{
		$query = DB::select('*')->from('ads')->as_assoc()
		->execute();
		
		return $query;
	}
	public static function authenticate($email) {
			
		
		
	
	
		// prepare an insert statement
		$query = DB::select('*')->from('login_users')->where(array(
			
				'email' => $email
				
				
	
	
		))->as_assoc()
		->execute();
		
		return $query;
	
	
	}
	
	
	
	public static function activate($email) {
			
	
	
	
	
		// prepare an insert statement
		$query = DB::update('login_users')->set(array('active'=>'1'))->where(array(
					
				'email' => $email
	
	
	
	
		))->as_assoc()
		->execute();
	
		return $query;
	
	
	}
	
	
	public  function get_info($email) {
			
	
	
	
	
		// prepare an insert statement
		$query = DB::select('*')->from('login_users')->where(array(
					
				'email' => $email
	
	
	
	
		))->as_assoc()
		->execute();
	
		return $query;
	
	
	}
	
	
	public  function get_info_id($id) {
			
	
	
	
	
		// prepare an insert statement
		$query = DB::select('*')->from('login_users')->where(array(
					
				'id' => $id
	
	
	
	
		))->as_assoc()
		->execute();
	
		return $query;
	
	
	}
	
}
