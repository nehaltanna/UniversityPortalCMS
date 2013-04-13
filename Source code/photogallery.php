<?php
include("themes/inc_index_1.inc.php");	
	echo "<head>";
	$gal=$_GET['gid'];
$kite=opendir("images/photogallery/$gal/");
$i=0;
$strt=1;
echo" <html>
<head>
<script type='text/javascript'>";
while(($fileread[$i]=readdir($kite))!=false){
if($i<0){$i++;}

else{
$kkl[$strt]=$fileread[$i];
echo "var image$strt=new Image()
image$strt='images/photogallery/$gal/$fileread[$i]';";
$i++;
$strt++;
}
}
echo "</script>";?>
<div  class="div_middle_right_left">
	<div style="margin:10px;">
<div id="enlarged" align="center">
<img src="" name="slide" height="100%" width="100%">
<hr color="silver">
<script type="text/javascript">
function image(k){
var l=k
var image="image"
document.images.slide.src=eval(image+k)
}
</script></div>
<?php $k=0;echo "<center>";
while($k<$strt+1)
{
	
	if($k%4==0)
	{
		//$l=$fileread[$k];
		//echo "<img onclick=image($k+1) src='images/photogallery/$gal/$fileread[$k]' height='100' width='100'></a>";
		echo "<br />";
		//$k++;
	}
	//else
	//{
		$l=$fileread[$k];
		echo "<img onclick=image($k+1) src='images/photogallery/$gal/$fileread[$k]' height='100' width='100'></a>";
		$k++;
		//}
	}
echo "</center>";
?>
	<form action="slideshow.php" method="post" >
	<input type="hidden" value="<?php echo $gal;?>" name="cache">
<center><b><input type="Submit" name="Submit" value="slideshow">	</b></center>
	</form></div>		
</div>
<?php
	include("themes/inc_index_2.inc.php");
?>