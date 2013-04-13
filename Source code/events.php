<?php
	include("themes/inc_index_1.inc.php");
	
	$event=$_GET['eid'];
?> 

<div class="div_middle_right_left">
	<div style="margin:10px;">
	<center>
		<?php
			$sql = "SELECT event_img_url from events where event_id='$event'";
			$result = mysql_query($sql,$con);
			$row = mysql_fetch_row($result);
			
			echo "<img src=".$row[0]." height='400px' width='620px' alt='No such photo is set for this event' />";
		
				$sql = "SELECT event_info from events where event_id='$event'";
				$result = mysql_query($sql,$con);
				$row = mysql_fetch_row($result);
				echo "<h2 align='center' style='color:#990B09;'>About ".$event."</h2>";
				echo "</center>";
				echo "<span style='text-align:justify;'>";	
				echo nl2br($row[0]);
				echo "</span>";
		?>
	</div>		
</div>
	
<?php
	include("themes/inc_index_2.inc.php");
?>