<?php 

class Auth extends Controller
{
  public function action_session($provider)
  { 
    $provider = OAuth2\Provider::forge($provider, array(
        'id' => '752899006608-opta9ev74abokduf7nv9i6l3gondhkts.apps.googleusercontent.com',
        'secret' => 'notasecret',
    ));

    if ( ! isset($_POST['code']))
    {
        // By sending no options it'll come back here
        $provider->authorize();
    }

    else
    {
        // Howzit?
        try
        {
            $token = $provider->access($_POST['code']);

            // Save access_token for now
            Session::set('access_token', $token->access_token);

            // Optional: Use the token object to grab user data from the API
            $user = $provider->get_user_info($token);

            // Here you should use this information to A) look for a user B) help a new user sign up with existing data.
            // If you store it all in a cookie and redirect to a registration page this is crazy-simple.
            echo "<pre>";
            var_dump($user);
        }

        catch (OAuth2\Exception $e)
        {
            show_error('That didnt work: '.$e);
        }

    }
  }
}