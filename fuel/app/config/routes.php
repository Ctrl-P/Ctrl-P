<?php
return array(
	'_root_'  => 'layout',  // The default route
	'_404_'   => '404',    // The main 404 route
	'register'   => 'register',    // The Register route
	'login_valid'   => 'loginvalid',    // Google Authentication Call Back URL
	'login'   => 'layout/login',    // Google Authentication Call Back URL
    'layout_test'   => 'layout_test',   // Testing New Theme
	'account' => 'account',
	'upload' => 'account/upload',
	'format' => 'account/format',
		'queue' => 'account/queue',
		'manage' => 'account/manage_user',
		'ads' => 'account/ads',
		'upload_ad' => 'account/ads_upload',
		'manage/view-balance(/:id)?' => 'account/balance',
		'logout' => 'account/logout', 
		'manage-account' => 'account/manage',
		'toprint' => 'account/toprint', 
		'notoken' => 'account/notoken',
	'hello(/:name)?' => array('welcome/hello', 'name' => 'hello'),
); 