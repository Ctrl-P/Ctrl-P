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
	<script type="text/javascript">

	$(document).ready(function() {
	    $('#selectAll').click(function(event) {  //on click 
	        if(this.checked) { // check select status
	            $('.checkbox1').each(function() { //loop through each checkbox
	                this.checked = true;  //select all checkboxes with class "checkbox1"               
	            });
	        }else{
	            $('.checkbox1').each(function() { //loop through each checkbox
	                this.checked = false; //deselect all checkboxes with class "checkbox1"                       
	            });         
	        }
	    });


	    
	    
	});

	</script>
	<div class="container">
		
			
			<p><?php 
			
?>
<h1>View Users</h1>
<div class="jumbotron" style="background-color: #F9F9F9; padding-top:15px; padding-left:15px; padding-right:15px;">
<?php 

?><a href="/getusers/"><input type="button" class="btn pull-right btn-success" value="Export Users Excel"></a>&nbsp;&nbsp;&nbsp;
 <a href="/getprintings/"><input type="button" class="btn pull-right btn-success" value="Export Print Jobs Excel"></a><br>
<form action="" method="post">
<div class="pull-right">Add credits to selected user(s): <input type="text" name="pages" size="3" class="input-sm" > page(s) <input type="submit" value="Add" class="btn btn-success"></div><br>
<table class="table table-striped"><br>

<tr style="font-size:14px;">
<th><input type="checkbox" id="selectAll"> &nbsp;Name</th>
<th>Email</th>
<th>Gender</th>
<th>DoB</th>
<th>Program</th>
<th>Graduation</th>
<th>Nationality</th>
<th>Balance</th>
<th>Printed Pages</th>
<th>Printed Documents</th>
</tr>

<?php
$total = 0;
$pagesss = 0;
for($i = 0; $i < count($accounts); $i++)
{
$total += $accounts[$i]['prints'];
$pagesss +=$accounts[$i]['pagess'];
?>

<tr style="font-size:12px;">
<td><input type="checkbox" class="checkbox1" name="user_sel[]" value="<?= $accounts[$i]['id'] ?>"> &nbsp;<?= $accounts[$i]['fname'] ?> <?= $accounts[$i]['lname'] ?></td>
<td><?= $accounts[$i]['email'] ?></td>
<td><?= $accounts[$i]['gender'] ?></td>
<td><? if($accounts[$i]['dob'] != "0000-00-00" && $accounts[$i]['dob'] != "" )
	echo date("d-m-Y",strtotime($accounts[$i]['dob']));
else 
	echo "N/A"; ?></td>
<td><?= $accounts[$i]['program'] ?></td>
<td><?= $accounts[$i]['graduate_date'] ?></td>
<td><?= $accounts[$i]['country'] ?></td>
<td><a href="view-balance/<?php echo $accounts[$i]['id']; ?>" style="color:green; cursor:pointer;"><?= $accounts[$i]['balance'] ?> Page(s)</a></td>
<td><?= $accounts[$i]['pagess'] ?> Page(s)</a></td>
<td><?= $accounts[$i]['prints'] ?> File(s)</a></td>
</tr>

 

<?php 


}
	?>
<tr style="font-size:14px;"><td colspan="8">TOTAL</td>
<td><?= $pagesss ?> Page(s)</td>
<td><?= $total ?> File(s)</td></tr>


</table>
</form>

			
		
		

		
		<hr/>
	
	</div>

</body>
</html>
