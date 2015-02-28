<?php

	
	
// request a google account sign-in here:
	
  header("Location: https://accounts.google.com/o/oauth2/auth?".
  "oauth_consumer_key=code".
  "&client_id=752899006608-q24ak92hnnf1h8epggqc2kgb8e8klsdr.apps.googleusercontent.com".
  "&state=prod". 
  "&access_type=offline".
  "&approval_prompt=auto".
  "&redirect_uri=http://hec.ncitsolutions.com/login_valid".
  "&scope=email".
  "&response_type=code");













