<?php
	include("themes/inc_index_1.inc.php");
?>	
<div class="div_middle_right_left">
	<div style="margin:10px;text-align:left;">

			<h2 style="color:#FFFFFF;background-color:#616161;padding-left:10px;">Address</h2>
				<?php
						$sql = "SELECT address from contact_us";
						$result = mysql_query($sql,$con);
						$row = mysql_fetch_row($result);
						echo nl2br($row[0]);
				?>
		 	<h2 style="color:#FFFFFF;background-color:#616161;padding-left:10px;">How to reach us</h2>
				<?php
						$sql = "SELECT address_img from contact_us";
						$result = mysql_query($sql,$con);
						$row = mysql_fetch_row($result);
						$img=$row[0];
						echo "<img src='$img' height='500' width='620' alt='image not available'/>";
				?>
			<h2 style="color:#FFFFFF;background-color:#616161;padding-left:10px;">Contact us at</h2>
				<?php
						$sql = "SELECT contactus_at from contact_us";
						$result = mysql_query($sql,$con);
						$row = mysql_fetch_row($result);
						echo nl2br($row[0]);
				?>
			<h2 style="color:#FFFFFF;background-color:#616161;padding-left:10px;">Visit us at</h2>
				<?php
						$sql = "SELECT website from contact_us";
						$result = mysql_query($sql,$con);
						$row = mysql_fetch_row($result);
						echo nl2br($row[0]);
				?>
			<h2 style="color:#FFFFFF;background-color:#616161;padding-left:10px;">Placement Department</h2>
				<?php
						$sql = "SELECT placement_dept from contact_us";
						$result = mysql_query($sql,$con);
						$row = mysql_fetch_row($result);
						echo nl2br($row[0]);
				?>
			<h2 style="color:#FFFFFF;background-color:#616161;padding-left:10px;">Admission Department</h2>
				<?php
						$sql = "SELECT admission_dept from contact_us";
						$result = mysql_query($sql,$con);
						$row = mysql_fetch_row($result);
						echo nl2br($row[0]);
				?>
	</div>		
</div>
		
<?php

	mysql_close($con);
	include("themes/inc_index_2.inc.php");
?>


