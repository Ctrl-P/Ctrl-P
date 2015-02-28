<?php

class Model_Printings
{
	
	function uploadfile($user, $file, $internal, $pages )
	{
		$query = DB::insert('uploaded_files')->set(array(
		
				'user_name'=>$user,
				'file_name'=>$file,
				'internal_name' => $internal,
				'pages' => $pages,
		
				'upload_date_time' => date("Y-m-d H:i:s"),
		
		
		
		))
		->execute();
		
	}
	
	function removePrint($id)
	{
		DB::delete('uploaded_files')->where(array(
			
		'entry_id' =>$id,
		))->execute();
		return "OK";
	}
	
	function upload_ad($internal, $name, $max)
	{
		$query = DB::insert('ads')->set(array(
		
				
				'internal_location'=>$internal,
				'given_name' => $name,
				'maximum_times' => $max,
				'current_times' => 0,
		
			
		
		
		
		))
		->execute();
		
		
		
		
	
		$file = $internal;
		$fp = fopen(DOCROOT . 'files/'.$file, 'r');
		$ftp_server = "ctrl-p.hec.fr";
		
		// set up basic connection
		$conn_id = ftp_connect($ftp_server);
		
		// login with username and password
		$login_result = ftp_login($conn_id, "main","hecmain");
		
		// try to upload $file
		$dd = ftp_fput($conn_id, "banner".rand().".jpg", $fp, FTP_BINARY) ;
	
		if($dd)
		{
			ftp_close($conn_id);
		fclose($fp);
		return true;
		}
		else
		{
			return false;
		}
		
		
		// close the connection and the file handler
		
		
		
	}
	
	function  getQueue( )
	{
		
		$query = DB::select('*')->from('uploaded_files')->where(array(
					
				'user_name' =>Session::get("userid"),
				'printed' => '0',
	
	
	
	
		))->as_assoc()
		->execute();
	
		return $query;
	
	}
	
	
	function  getQueueNew( )
	{
	
		$query = DB::select('*')->from('file_queue')->where(array(
					
				'user_name' =>Session::get("userid"),
				'printed' => '0',
	
	
	
	
		))->as_assoc()
		->execute();
	
		return $query;
	
	}
	
	
	
	function  getQueueHistory( )
	{
	
		$query = DB::select('*')->from('file_queue')->where(array(
					
				'user_name' =>Session::get("userid"),
				'printed' => '1',
	
	
	
	
		))->as_assoc()
		->execute();
	
		return $query;
	
	}
	
	function movetoPrint($id)
	{
		$query = DB::select('*')->from('uploaded_files')->where(array(
					
				'entry_id' =>$id,
		
		))->as_assoc()
		->execute();
		
		
		$account = new Model_User();
		$info = $account->get_info( Session::get ( "userid" ));
		
		if($info[0]['balance']>= $query[0]['pages'])
		{
		DB::insert('file_queue')->set(array(
		
				'user_name'=>$query[0]['user_name'],
				'file_name'=>$query[0]['file_name'],
				'internal_name' => $query[0]['internal_name'],
				'pages' => $query[0]['pages'],
		
				'added_dt' => date("Y-m-d H:i:s"),
				'printed' => '0',
				'bal_before' => $info[0]['balance'],
				'bal_after' =>  ( $info[0]['balance'] - $query[0]['pages'] )
		
		
		))
		->execute();
		
		$account->updateBalance(Session::get ( "userid" ), $query[0]['pages']);
		
		
		DB::delete('uploaded_files')->where(array(
			
		'entry_id' =>$id,
		))->execute();
		return "OK";
		}
		else
		{
			return "Insufficient";
		}
		
	}
	
	function  getQueueUser($email )
	{
		
		$query = DB::select('*')->from('file_queue')->where(array(
					
				'user_name' =>$email,
				
	
	
	
	
		))->as_assoc()
		->execute();
	
		return $query;
	
	}
	
	
}