<?php
	include("themes/inc_index_1.inc.php");
	
	$sql = "SELECT directors_img from directors_desk";
	$result = mysql_query($sql,$con);
	$row = mysql_fetch_row($result);
?> 

<div class="div_middle_right_left">
	<div style="margin:10px;">
	<?php
			echo "<center><img src='$row[0]' alt='image not available' height='200px' width='200px' /></center><br />";
			$sql = "SELECT directors_desk from directors_desk";
			$result = mysql_query($sql,$con);
			$row = mysql_fetch_row($result);
			echo nl2br($row[0]);
	?>
	</div>		
</div>

<?php
	include("themes/inc_index_2.inc.php");
?>