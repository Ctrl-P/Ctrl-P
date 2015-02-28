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
	
	<div class="container"><h1>Upload Ad</h1>
		<div class="jumbotron" style=" padding-top:20px;">
			
			<p><?php 
			
?>

<br>



<div class="jumbotron" style="background-color: #F9F9F9; padding-top:15px;">
<?php 

?><br>
<div style="text-align:center">

</div>
<br>
<form action="" method="post" enctype="multipart/form-data" >
Ad File to Upload:<br>
<input type="file" name="ad_file" class="form-control" required="required">


<br>

Ad Name:
<input type="text" name="ad_name" class="form-control" required="required">

<br>

Maximum Print(s):
<input type="text" name="max_print" class="form-control" required="required"><br>


<input type="submit" class="btn btn-lg btn-success" value="upload">

</form>
			
		</div>
		

		
		<hr/>
	
	</div>

</body>
</html>
