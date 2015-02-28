<?php echo $head; ?>
<script src="http://code.jquery.com/jquery-1.10.2.js"></script>
	 <link rel="stylesheet" href="http://code.jquery.com/ui/1.11.1/themes/smoothness/jquery-ui.css">
	 <script src="http://code.jquery.com/ui/1.11.1/jquery-ui.js"></script>
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

	$(function() {
		 $( "#dob" ).datepicker({showButtonPanel: true,});
	  $( "#dob" ).change(function() {
	    	$( "#dob" ).datepicker( "option", "dateFormat", "dd-mm-yy" );
	      });
	
});

	</script>

	
	<div class="container"><h1>My Account</h1>
		<div class="jumbotron">
		<form action="" method="post">
			
			<br>
			<?php 
			if($msg !="")
			{
?>

<div style="text-align:center">
<span class="alert alert-success">Account information updated successfully!</span><br><br>
</div> 
<?php 

}
			
			?>
			<strong>Update account information</strong>
			
		
  <?php 
  
  
  $dd = explode("-",$dob);
  
  ?>
  
  <span>Date of birth (dd-mm-yyyy): </span><span style='color:red;' >[optional]</span>
  <table>
  <tr>
  <td>
  <select name="dob-d" class="form-control"> 
  <option value="" <?php if (! isset($dd[1]) ) echo "selected = 'selected' "; ?> >Day</option>
  <?php 
  for($i=1; $i <= 31; $i++)
  {
if ( isset($dd[1]) && $dd[0] == $i)
{
$sel1 = " selected = 'selected' ";
}
else
{
	$sel1 = " ";
}
  	echo "<option value='$i' $sel1 >$i</option>";
  }
  ?>
  </select>
  
  </td>
  <td>
  <select name="dob-m" class="form-control">
  <option value="" >Month</option>
  <?php 
  for($i=1; $i <= 12; $i++)
  {

if ( isset($dd[1]) && $dd[1] == $i)
{
	$sel2 = " selected = 'selected' ";
}
else
{
	$sel2 = " ";
}


  	echo "<option value='$i' $sel2 >".date("M",strtotime(date("Y")."-".$i."-01"))."</option>";
}  
  ?>
  </select>
  </td>
  <td>
  <select name="dob-y" class="form-control">
  <option value="" >Year</option>
  <?php 
  for($i=1950; $i <= (date("Y")-16); $i++)
  {
if ( isset($dd[1]) && $dd[2] == $i)
{
	$sel3 = " selected = 'selected' ";
}
else
{
	$sel3 = " ";
}

  	echo "<option value='$i' $sel3 >".$i."</option>";
  }
  ?>
  </select>
  </td>
  </tr>
  </table>
  
  
  <br>
  <strong>Current account details</strong>
	<table>
	<tr>
		<td>Email address:</td>
		<td><?= $email ?></td>
	</tr> 
	
	
	<tr>
		<td>Nationality:</td>
		<td><?= $country ?></td>
	</tr>
		
	<tr>
		<td>Gender:</td>
		<td><?= ucfirst($gender); ?></td>
	</tr>
		
		<tr>
		<td>Program:</td>
		<td><?= $program ?></td>
	</tr>
	
	<tr>
		<td>Graduation date:</td>
		<td><?= $graddate ?></td>
	</tr>
	

	
	</table>	
		
		
  <br>
  <a href="/account/"><input type="button" value="Back" class="btn btn-success " ></a>
  <input type="submit" value="Update" class="btn btn-success pull-right">
  </form>
		</div>
		
		
	
  
  
</body>



</html>
