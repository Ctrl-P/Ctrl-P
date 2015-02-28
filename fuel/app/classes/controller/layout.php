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


use \Model\Layout;
use Fuel\Core\Theme;
class Controller_Layout extends Controller
{

	/**
	 * The basic welcome message
	 *
	 * @access  public
	 * @return  Response
	 */
	public function action_index()
	{


        /* // load the theme template
        $this->theme = \Theme::instance();

        // set the page template
        $this->Theme->set_template('default');


        // set the page title (can be chained to set_template() too)
        $this->theme->get_template()->set('title', 'My homepage');

        // set the homepage navigation menu
        $this->theme->set_partial('navbar', 'homepage/navbar');

        // define chrome with rounded window borders for the sidebar section
        $this->theme->set_chrome('sidebar', 'chrome/borders/rounded', 'partial');

        // set the partials for the homepage sidebar content
        $this->theme->set_partial('sidebar', 'homepage/widgets/login');
        $this->theme->set_partial('sidebar', 'homepage/widgets/news')->set('news', Model_News::latest(5));

        // call the user model to get the list of logged in users, pass that to the users sidebar partial
        $this->theme->set_partial('sidebar', 'homepage/widgets/users')->set('users', Model_User::logged_in_users());
 */
		// Get the default instance
		
		/*  $theme = \Theme::instance();
		
		// Get a custom instance
		$theme = \Theme::instance(
				 APPPATH.'themes/custom',
				array(
						'active' => APPPATH.'themes/custom/',
						'fallback' => APPPATH.'themes/custom/',
						'view_ext' => '.html'
				)
		);
		
		 $theme = \Theme::forge(array( 
				'active' => APPPATH.'themes/custom/',
				'fallback' => APPPATH.'themes/custom/',
				'view_ext' => '.html',
		));  */
		 
		return Response::forge(View::forge('layout'));
		
	}

	public function action_login()
	{
		
		return Response::forge(View::forge('sign_in'));
	}
	
}
