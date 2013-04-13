<?php
	include("themes/inc_index_1.inc.php");
	if($type!="student")
	{	
		echo "<script>window.location='home.php'</script>";
	}
	$prn=$uname;
?>	
<div class="div_middle_right_left">
	<div style="margin:10px;">
	<center>
		<h2 style='background-color:#990B09;color:#CCCCCC;text-align:center;'>Attendance</h2>
			<?php
				$p=0;
				$t=0;
				$sql="select distinct start_date,end_date from attendance where stud_id='$prn'";
				$result = mysql_query($sql,$con);
				while($row = mysql_fetch_row($result)) 
				{
					echo "<h3 style='color:#FFFFFF;background-color:#616161;padding-left:10px;text-align:left;'>";
					$sd=explode('-',$row[0]);
					$ed=explode('-',$row[1]);
					echo "From $sd[2]-$sd[1]-$sd[0] to $ed[2]-$ed[1]-$ed[0]";
					echo "</h3>";
					$sql1="select sub_id,total_lectures,no_absent from attendance where stud_id='$prn' and start_date='$row[0]' and end_date='$row[1]'";
					$result1 = mysql_query($sql1,$con);
					echo "<table border='0' width='625px'>";
					echo "<tr style='font-weight:bolder;'><td align=center>Subject Name</td><td align=center>Total lectures</td><td align=center>Total Presence</td><td align=center>Total Absent</td></tr>";					 
					while($row1 = mysql_fetch_row($result1))
					{
							$t=$t+$row1[1];
							$p=$p+($row1[1]-$row1[2]);
						 	echo "<tr><td align=center>$row1[0]</td><td align=center>$row1[1]</td><td align=center>".($row1[1]-$row1[2])."</td><td align=center>$row1[2]</td></tr>";
					}
					echo "</table>";
			  }
			  echo "<br /></center>";
			  $val=($p*100)/$t;
			  echo "<h4 align=right style='background-color:#990B09;color:#CCCCCC;'>Over All Attendance &nbsp;". round($val,2) ." %</h4>";
			?>
	</div>		
</div>

<?php
	mysql_close($con);
	include("themes/inc_index_2.inc.php");
?>