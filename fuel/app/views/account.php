<?php echo $head; ?>
<body>
	<header>
		<div class="container">
			<div id="logo"><a href="/account/"><?php echo Asset::img('hec_paris.png'); ?></a></div>
			<div class="pull-right" style="color:#CCCCCC; margin-top:-35px;">
			<span style="color:<?php 
			if($balance >= 10 )
				echo "lime;";
			elseif($balance > 0 )
				echo "yellow;";
			else 
				echo "pink;";
			
			?>;">Balance: <?php echo $balance; ?> Page(s).</span><br>
			<span style="color:white;"><?php echo Session::get("userfullname");?> [<a href="/logout/" style='color:yellow;'>Logout</a>]</span><br>
			<?php echo Session::get("userid");?></div>
		</div>
	</header>
	
			<?php 
		if($balance==0)
		{
?>
<div style="text-align:center">
<span class="alert alert-danger"><strong>Warning!</strong> Your balance is at zero! Please wait until the first day of the next month for more credits.</span><br><br>
</div> 
<?php 

}elseif($balance<10)
		{
?>
<div style="text-align:center">
<span class="alert alert-warning"><strong>Warning!</strong> Your balance is low! Please confirm you have enough credits before printing your next document(s).</span><br><br>
</div> 
<?php 

}?>


	<div class="container ">
		<h1>Welcome!</h1>
		
		<hr/>
<div class="row">
<?php 

if($role == "sys_admin")
{

?>
<div class="col-lg-2" style='text-align:center;' ><a href="../manage/">
		<?php echo Asset::img('User.png')?><br><br>
		<strong>View Users</strong></a>
		</div>
		
		
		
		<div class="col-lg-2" style='text-align:center;' ><a href="../ads/">
		<?php echo Asset::img('Banner.png')?><br><br>
		<strong>Banner Ad Manager</strong></a>
		</div>
	
<?php 
}
?>	

<div class="col-lg-2" style='text-align:center;' ><a href="../upload/">
		<?php echo Asset::img('Upload.png')?><br><br>
		<strong>Upload Documents</strong></a>
		</div>
		
		
	<div class="col-lg-2" style='text-align:center;' ><a href="../queue/">
	<?php echo Asset::img('picon.png')?><br><br>
		<strong>My Print Queue</strong></a>
	</div>	
	
	
	<div class="col-lg-2" style='text-align:center;' ><a href="../manage-account/">
	<?php echo Asset::img('View.png')?><br><br>
		<strong>My Account</strong></a>
	</div>	
	
	
	
	</div>
</div>
</body>
</html>
