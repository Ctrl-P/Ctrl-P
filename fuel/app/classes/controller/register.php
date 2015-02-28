<?php
/**
 * Fuel is a fast, lightweight, community driven PHP5 framework.
 *
 * @package    Fuel
 * @version    1.7
 * @author     Fuel Development Team
 * @license    MIT License
 * @copyright  2010 - 2014 Fuel Development Team
 * @link       http://fuelphp.com
 */

/**
 * The Welcome Controller.
 *
 * A basic controller example.  Has examples of how to set the
 * response body and status.
 *
 * @package  app
 * @extends  Controller
 */

use \Model\Register; 
/* use \Model as Register; */ 

class Controller_Register extends Controller
{

	
	
	public function action_index()
	{
		if(isset($_POST['user_id']))
		{
			return $this->action_register();
		}
		
		$view = View::forge('register');
		
		return $view;
		
	}

	
	
	/**
	 * Register Function
	 */
	public function action_register()
	{
		
		$gennder = $_POST['gender'];
		
		$register = Model_User::register_new(
		$_POST['user_id'],  
		 $_POST['graduationy']."-".$_POST['graduationm'], 
				 $gennder, 
		 $_POST['dob-d']."-".$_POST['dob-m']."-".$_POST['dob-y'],
		$_POST['country'],
		$_POST['program']);
		
		//return Response::redirect('success');
		if($register)
		return Response::forge(View::forge('success'));
		else
			return Response::forge(View::forge('fail'));
	}
	
}
