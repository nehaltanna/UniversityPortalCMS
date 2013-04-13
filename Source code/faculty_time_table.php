<?php
	include("themes/inc_index_1.inc.php");
	if($type!="faculty")
	{	
		echo "<script>window.location='home.php'</script>";
	}
	$facl=$uname;
?> 
<div class="div_middle_right_left">
	<div style="margin:10px;">
	<center>
		<?php				
			$sql = "SELECT ftt_text from faculty_time_table WHERE faculty_id='$facl'";
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