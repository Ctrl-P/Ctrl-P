<?php echo $head ; ?>
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
	
	<div class="container">
		<div class="jumbotron" style=" padding-top:20px;">
			
			<p><?php 
			
?>
<h1>Upload Ad</h1>
<br>



<div class="jumbotron" style="background-color: #F9F9F9; padding-top:15px;">
<?php 

?><br>
<div style="text-align:center">

<?php 
if($res=="OK")
{
?>
<span class="alert alert-success" style="font-size: 15px;">
<strong>Done!</strong> Advertisement uploaded sucessfully</span><br><br>
<br><a href="/ads/"><input type="button" class="btn btn-lg btn-success" value="Back to Manage Ads"></a>

<?php 
}
else 
{
if($res=="NOT VALID")
{
	$msg = "Incorrect file type. Please upload .JPG files only!";
}

if($res=="NO")
{

$msg="Could not upload file to Printing Server.";
}

?>
<span class="alert alert-danger" style="font-size: 15px;">
<strong>Error!</strong> <?php echo $msg; ?></span><br><br>

<?php 
}	

?>
</div>


			
		</div>
		

		
		<hr/>
	
	</div>

</body>
</html>
