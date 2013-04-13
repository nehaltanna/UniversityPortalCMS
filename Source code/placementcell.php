<?php
	include("themes/inc_index_1.inc.php");
	
	$sql = "SELECT placement_cell from placement";
	$result = mysql_query($sql,$con);
	$row = mysql_fetch_row($result);
?> 

<div class="div_middle_right_left">
	<div style="margin:10px;">		
	<?php
		echo $row[0];
	?>
	</div>		
</div>

<?php
	include("themes/inc_index_2.inc.php");
?>