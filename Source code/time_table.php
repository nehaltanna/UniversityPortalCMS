<?php
	include("themes/inc_index_1.inc.php");
	if($type!="student")
	{	
		echo "<script>window.location='home.php'</script>";
	}
	$prn=$uname;
	$sql = "SELECT group_id from students where stud_id='$prn'";
	$result = mysql_query($sql,$con);
	$row = mysql_fetch_row($result);
	$group=$row[0];
	
?> 
<div class="div_middle_right_left">
	<div style="margin:10px;">
	<center>
		<?php				
			$sql = "SELECT tt_text from time_table where group_id='$group'";
			$result = mysql_query($sql,$con);
			$row = mysql_fetch_row($result);
		?>
	<h2>Time Table :</h2>
	<?php
		echo $row[0];
	?>
	</center>
	</div>		
</div>

<?php
	mysql_close($con);
	include("themes/inc_index_2.inc.php");
?>