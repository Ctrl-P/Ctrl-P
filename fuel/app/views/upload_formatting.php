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
	
	<div class="container"><h1>Formatting Instructions</h1>
		<div class="jumbotron" style=" padding-top:20px;">
			
			<p><?php 
			
?>

<div class="jumbotron" style="background-color: #F9F9F9; padding-top:15px;">
<form action="/queue/" method="post">

<div class="input-group-lg">
  <span>Side Printing:</span>
  <select  name="siding" class="form-control"> 
  	<option value="double">Double-Sided</option>
 
  </select>
  </div>
  <br>
  
  <div class="input-group-lg">
  <span>Color Printing:</span>
  <select  name="siding" class="form-control"> 
  	<option value="bw">Black and White</option>
 
  </select>
  </div>
  
  <br>
  <div class="input-group-lg">
  <span>Paper Size:</span>
  <select  name="siding" class="form-control"> 
  	<option value="a4">A4 Paper</option>
 
  </select>
  </div>
  
<br>
<input type="hidden" name="pages" value="<?php echo $pages; ?>" >
<input type="submit" value ="Proceed &gt;" class="btn btn-lg btn-primary pull-right" >
<br>
</form>
			
		</div>
		

		
		<hr/>
	
	</div>

</body>
</html>
