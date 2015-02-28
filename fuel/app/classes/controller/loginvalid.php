<?php
class Controller_Loginvalid extends Controller
{
	
	/**
	 * The basic welcome message
	 *
	 * @access public
	 * @return Response
	 */
	public function action_index()
	{
		
		// get users' email address:
		
		if(!isset($_GET ['code']))
		{
			return Response::forge(View::forge('notoken'));
		}
		Session::set ( 'access_token', $_GET ['code'] );
		// send token to gmail
		
		// now create cURL request
		
		$ch = curl_init ();
		
		curl_setopt ( $ch, CURLOPT_URL, "https://accounts.google.com/o/oauth2/token?" );
		curl_setopt ( $ch, CURLOPT_POST, 1 );
		curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, 1 );
		curl_setopt ( $ch, CURLOPT_POSTFIELDS, "code={$_GET['code']}" . "&client_id=752899006608-q24ak92hnnf1h8epggqc2kgb8e8klsdr.apps.googleusercontent.com" . "&client_secret=LEhGnQ5TkEY7mw7-VN2mzggA" . "&redirect_uri=http://hec.ncitsolutions.com/login_valid" . "&grant_type=authorization_code" );
		
		$info = curl_exec ( $ch );
		$inf = json_decode ( $info, true );
		if (isset ( $inf ['id_token'] ))
		{
			$token = $inf ['id_token'];
			$tt = explode ( ".", $token );
			
			$infdata = json_decode ( base64_decode ( $tt [1] ), true );
			// print_r( $infdata);
			
			if ($infdata ['email_verified'])
			{
				if($infdata ['email'] != ""  && strpos($infdata ['email'],"@hec.edu")!==false  )
				{
				// validate if email is registered..
				$validate_login = Model_User::authenticate($infdata ['email']);
				
				if(count($validate_login)==1)
				{
					// proceed with login..
					$session = Session::instance();
					Session::set('userid', $infdata ['email']);
					Session::set('userfullname', ucfirst( $validate_login[0]['fname'])." ".ucfirst ($validate_login[0]['lname']));
					
					// set account active
					 Model_User::activate($infdata ['email']);
					
					
					header("Location: ./account");
				}
				else {
					return Response::forge(View::forge('loginfailed'));
				}
				
				}
				else
				{
					return Response::forge(View::forge('notvalidemail'));
				}
				
			} else
			{
				return Response::forge(View::forge('notvalid'));
				// email not verified
			}
		} else
		{
			// token not found
			return Response::forge(View::forge('notoken'));
		}
	}
}

?> 