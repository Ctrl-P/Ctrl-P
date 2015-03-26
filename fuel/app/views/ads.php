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
	
	<div class="container"><h1>Manage Ads</h1>
		<div class="jumbotron" style=" padding-top:20px;">
			
			<p><?php 
			
?>

<br>
<a href="/upload_ad/"><input type="button" value="Upload new banner" class="btn btn-lg btn-success" ></a>
 <a href="/getads/"><input type="button" class="btn btn-lg pull-right btn-success" value="Export Ads Logs Excel"></a><br>
<br><br>

<div class="jumbotron" style="background-color: #F9F9F9; padding-top:15px;">
<?php 

?><br>


<table class="table table-striped">
<tr style="font-size:16px;">
<th>Ad Name</th>
<th>Display</th>
<th>Printed</th>
<th>Maximum Prints</th>
<th>Ad Status</th>

</tr>

<?php

for($i = 0; $i < count($ads); $i++)
{

$pdf = "files/{$ads[$i]['internal_location']}";  
$fp_pdf = fopen($pdf, 'rb');

$img = new imagick(); // [0] can be used to set page number
$img->readImageFile($fp_pdf);
$img->setImageFormat( "jpg" );
$img->setImageCompression(imagick::COMPRESSION_JPEG);
$img->setImageCompressionQuality(90);

$img->setResolution(300,300);

$img->setImageUnits(imagick::RESOLUTION_PIXELSPERINCH);

$data = $img->getImageBlob();
$f = "files/ads/".rand(0,8000).".jpg";
file_put_contents($f, $data);



?>

<tr style="font-size:13px;">
<td><?= $ads[$i]['given_name'] ?></td>
<td><div style="width:530px; height:100px; background: url('<?= "../".$f ?>') no-repeat  ; "  ></td>
<td><?= $ads[$i]['current_times'] ?></td>
<td><?= $ads[$i]['maximum_times'] ?></td>
<td><?= $ads[$i]['status'] ?></td>

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
