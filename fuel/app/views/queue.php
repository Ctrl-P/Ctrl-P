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
	
	<div class="container"><h1>My Print Queue</h1>
		<div class="jumbotron" style=" padding-top:20px;">
			
			<p><?php 
			
?>

<div class="jumbotron" style="background-color: #F9F9F9; padding-top:15px;">
<?php 

?><br>
<span class="alert alert-warning"><b>Attention!</b> Clicking 'Print now' deploys the job immediately, so please be in front of the printer!</span>
<br><br>
<table class="table table-striped">
<tr>
<th>File Name</th>
<th>Date/Time Added</th>
<th>Page(s)</th>
<th>Status</th>
<th>Action</th>
</tr>

<?php
if(count($printings)>0)
{
 for($i = 0; $i<count($printings); $i++)
{
	?><form action="/toprint/" method="post">
	<tr>
	<td><?= $printings[$i]['file_name'] ?></td>
	<td><? echo date("d-m-Y H:i",strtotime($printings[$i]['upload_date_time'])); ?></td>
	<td><?= $printings[$i]['pages'] ?></td>
	<?php 
	if($printings[$i]['printed'] == 1)
	{
	?>
	<td style="color:green;">Printing</td>
	<?php 
	}
	else
	{
	?>
	<td style="color:orange;">Queued </td><td><input type="hidden" name="file" value="<?php echo $printings[$i]['entry_id']; ?>" ><input type="submit" name="print" value = "Print now" class = "btn  btn-success" > &nbsp; <input type="submit" name="cancel" value = "Cancel" class = "btn  btn-danger" ></td>
	<?php 
	}
	?>
	</tr>
	</form>
<?php 
}
	}
	
	else
	{
?>
<tr>
<td colspan=5>No files are currently queued!</td>
</tr>
<?php
}
	?>



</table>
</div>
<br><br>







</div>

<h1>My Print Queue History</h1>
<div class="jumbotron" style="background-color: #F9F9F9; padding-top:15px;">
<?php 

?><br>
<table class="table table-striped">
<tr>
<th>File Name</th>
<th>Date/Time Added</th>
<th>Page(s)</th>
<th>Status</th>
</tr>

<?php
$pages = 0;
if(count($printingsH)>0)
{
 for($i = 0; $i<count($printingsH); $i++)
{
$pages += $printingsH[$i]['pages'];
	?>
	<tr>
	<td><?= $printingsH[$i]['file_name'] ?></td>
	<td><? echo date("d-m-Y H:i",strtotime($printingsH[$i]['added_dt'])); ?></td>
	<td><?= $printingsH[$i]['pages'] ?></td>
	<?php 
	if($printingsH[$i]['printed'] == 1)
	{
	?>
	<td style="color:green;">Printed</td>
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
	<td colspan="2">TOTAL</td><td><?= $pages ?> Page(s)</td><td><?= count($printingsH) ?> File(s)</td> </tr>
<?php 
	}
	
	else
	{
?>
<tr>
<td colspan=4>No Files are currently in Queue!</td>
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
