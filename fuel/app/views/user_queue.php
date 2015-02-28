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
<h2>Printing Queue for <?php echo $email; ?></h2>
<div class="jumbotron" style="background-color: #F9F9F9; padding-top:15px;">
<?php 


if($add == "Added")
{
?>
<span class="alert alert-success">User Balance Updated Successfully!</span><br>
<?php 
}
?>

<div class="pull-right">
<form action="" method="post" >Add to Balance: <input type="text" name="balance1" required="required" value="0" size="2"  class="col-1" style="display:inline; border-radius:8px;"> <input type="submit" value="Add" class="btn btn-success btn-lg" ></form>
</div>
<br>

<table class="table table-striped">
<tr>
<th>File Name</th>
<th>Date/Time Added</th>
<th>Pages</th>
<th>Status</th>
</tr>

<?php
if(count($printings)>0)
{
$pages = 0;
 for($i = 0; $i<count($printings); $i++)
{
$pages += $printings[$i]['pages'];
	?>
	<tr>
	<td><?= $printings[$i]['file_name'] ?></td>
	<td><? echo date("d-m-Y H:i",strtotime($printings[$i]['upload_date_time'])); ?></td>
	<td><?= $printings[$i]['pages'] ?></td>
	<?php 
	if($printings[$i]['printed'] == 1)
	{
	?>
	<td style="color:orange;">Printed</td>
	<?php 
	}
	else
	{
	?>
	<td style="color:green;">Printing</td>
	<?php 
	}
	?>
	</tr>
	
	
	
<?php 
}

?>

<tr>
	<td colspan="2">TOTAL</td><td><?= $pages ?> Page(s)</td><td><?= count($printings) ?> File(s)</td> </tr>

<?php 
	}
	
	else
	{
?>
<tr>
<td colspan=4>No file are currently in queue!</td>
</tr>
<?php
}
	?>



</table>


			
		</div>
		

		
		<hr/>
	
	</div>

</body>
</html>
