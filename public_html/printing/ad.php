<?php
mysql_connect("localhost","hecncit_project","p123456");
mysql_select_db("hecncit_project");

$cycle = mysql_fetch_array(mysql_query("select * from cycles  limit 1"));
$upd = mysql_query("update ads set print_cycle = '{$cycle['ad_cycle']}' where print_cycle = '0'");
$adss = mysql_fetch_array(mysql_query("select * from ads where ( current_times < maximum_times or maximum_times = 0 ) and print_cycle = '{$cycle['ad_cycle']}' order by entry_id limit 1"));

if($adss['entry_id'] != "")
{
	mysql_query("update  ads set current_times = ".($adss['current_times'] +1 )." , print_cycle = print_cycle + 1 where entry_id =  ".$adss['entry_id']);
	// get last file
	// check if this is the max 
	
	$adss22 = mysql_num_rows(mysql_query("select * from ads where ( current_times < maximum_times or maximum_times = 0 ) and print_cycle = '{$cycle['ad_cycle']}' "));
	if($adss22 == 0 )
	{
		mysql_query("update cycles set ad_cycle = ad_cycle + 1 ");
	}
	 
	
	mysql_query("insert into ads_log ( printing_date, ad_name, email, document_name, times_to_print ) values (
	'".date("Y-m-d H:i:s")."' ,  '".$adss['given_name']."',  '".$file_get['user_name']."',  '".$file_get['file_name']."',  '".( $adss['maximum_times'] - ($adss['current_times'] +1 ))."' ) ");


	header("Content-Disposition: attachment; filename=\""."logo.pdf"."\"");
	header("Content-Type: application/pdf");
	
readfile("../files/".$adss['internal_location']);
}

