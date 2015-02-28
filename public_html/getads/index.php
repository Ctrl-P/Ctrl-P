<?php
mysql_connect("localhost","hecncit_project","p123456");
mysql_select_db("hecncit_project");

$q = "select * from ads_log order by entry_id  ";
$data = mysql_query($q);



header('Content-type: text/csv');
header('Content-Disposition: attachment; filename="ads_log.csv"');

echo "Date,".
		"Time,".
		"Ad Name,".
		"User Email,".
		"Document Name,".
		"No. Of time remaining for Ad to be printed\r\n";
		

while($d = mysql_fetch_assoc($data))
{
	//$sum = mysql_fetch_array(mysql_query("select sum(pages) as pgs from file_queue where user_name = '{$d['email']}' and printed = 1"));
	$dt = explode($d['printing_date']);
	
	echo $dt[0].",".
			$dt[1].",".
			$d['ad_name'].",".
			$d['email'].",".
			$d['document_name'].",".
			$d['times_to_print']."\r\n";
	
			
			
	
}

