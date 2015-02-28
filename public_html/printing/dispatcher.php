<?php
mysql_connect("localhost","hecncit_project","p123456");
mysql_select_db("hecncit_project");

$file = "select * from file_queue where printed = 0 and file_name like '%.docx' ";

$file_get = mysql_fetch_array(mysql_query($file));


if($file_get['entry_id'] != "")
{
// update the status of the file :
mysql_query("update file_queue set printed = 1 where entry_id = '{$file_get['entry_id']}' ");

// get the ads..

$adss = mysql_fetch_array(mysql_query("select * from ads where maximum_times > 0 and current_times < maximum_times "));
if($adss['entry_id'] != "")
{
	mysql_query("update  ads set current_times = ".($adss['current_times'] +1 )." where entry_id =  ".$adss['entry_id']);
	mysql_query("insert into ads_log ( printing_date, ad_name, email, document_name, times_to_print ) values (
	'".date("Y-m-d H:i:s")."' ,  '".$adss['given_name']."',  '".$file_get['user_name']."',  '".$file_get['file_name']."',  '".( $adss['entry_id'] - ($adss['current_times'] +1 ))."' ) ");
}



// get the file from server:

// docx :

$filePath = "../files/".$file_get['internal_name'];


header("Content-Disposition: attachment; filename=\""."download.docx"."\"");
header("Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document");

readfile($filePath);
}