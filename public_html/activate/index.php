<?php
mysql_connect("localhost","hecncit_project","p123456");
mysql_select_db("hecncit_project");
if(isset($_GET['id']))
{
	$q = mysql_query("update login_users set active='1' where md5(user_id) = '".$_GET['id']."' ");
	header("Location: /login/");
}