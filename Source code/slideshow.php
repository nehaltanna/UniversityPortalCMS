<?php
include("themes/inc_index_1.inc.php");	
$k=$_POST['cache'];
?>

<div  class="div_middle_right_left">
	<div style="margin:10px;">
	<?php
$kite=opendir("images/photogallery/$k/");
$i=0;
$strt=1;
echo" <html>
<head>
<script type='text/javascript'>
";
while(($fileread[$i]=readdir($kite))!==false){
if($i<0){$i++;}
else{
echo "
var image$strt=new Image()
image$strt.src='images/photogallery/$k/$fileread[$i]'";
$i++;
$strt++;
}
}
$r=0;
?>
</script>
</head>
<body>
<p align="center"><img src="" name='slide' border='0' height="100%" width="100%"/>	</p>
<p align="center" id="name"></p>
<script type="text/javascript">
var step=1
function slideit(){
<?php $r++; ?>
if (!document.images)
return
<?php $strt=$strt-1;echo"document.images.slide.src=eval('image'+step+'.src')
document.getElementById('name').innerHTML='$fileread[$r]'
if (step<".$strt.")";?>
step++
else
step=1

setTimeout("slideit()",1800)
}
slideit()
</script>
<?php ?>
	</div>
	</div>

<?php
	include("themes/inc_index_2.inc.php");
?>