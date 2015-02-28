<?php
mysql_connect("localhost","hecncit_project","p123456");
mysql_select_db("hecncit_project");

$q = "delete from  login_users where active ='0' and reg_date < '".date("Y-m-d",strtotime("-2 Days"))."' ";
mysql_query($q); 