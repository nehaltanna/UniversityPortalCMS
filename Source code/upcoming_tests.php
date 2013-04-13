<?php
	include("themes/inc_index_1.inc.php");
	if($type!="student")
	{	
		echo "<script>window.location='home.php'</script>";
	}
?>
	<head>
		<script language="javascript" src="calendar/calendar.js"></script>
	</head>
<?php
	require_once('calendar/classes/tc_calendar.php');
	
	$prn=$uname;
	$sdate=$_POST['sdate'];
	$edate=$_POST['edate'];
?>	
<div class="div_middle_right_left">
	<div style="margin:10px;">
		<center>
		<table border="0" width="620px" cellpadding="3">
		<?php
			$date=date('Y,m,d'); 		
			$arr=array('Test Name','Subject','Type','Evaluation','Test Marks', 'On Date');
			
			$sql = "SELECT tests.* from tests,subjects_groups,students where tests.sub_id=subjects_groups.sub_id and subjects_groups.group_id=students.group_id and students.stud_id='$prn' and test_date>='$date' order by tests.test_date";
			$result = mysql_query($sql,$con);
			
			echo "<tr>";
			echo "<td colspan=6><h2 style='background-color:#990B09;color:#CCCCCC;text-align:center;'>Upcomming Tests</h2></td>";
			echo "</tr>";
				
			echo "<tr>";
			for($i=0;$i<6;$i++)
			{
				echo "<td align='center'><font style='font-weight:bolder;text-decoration:underline;text-align:center;'>$arr[$i]</font></td>";
			}
			echo "</tr>";
									
			while($row = mysql_fetch_row($result)) 
			{				
				echo "<tr>";
				for($i=0;$i<5;$i++)
				{
					echo "<td align='center'><font style='text-align:center;'>$row[$i]</font></td>";
				}
				$d=explode("-",$row[5]);
				echo "<td align='center'><font style='text-align:center;'>$d[2]-$d[1]-$d[0]</font></td>";
				echo "</tr>";
			}			
			
			echo "</table><br />";
			echo "<form name='myform' action=upcoming_tests.php?pid=$prn method=post />";
			echo "<table border='0' width='620px' cellpadding='3'>";
			
			echo "<tr><td colspan=5><font style='font-weight:bolder;'>Show tests between</font></td><td align='center'><input type='submit' value='Show'></td></tr>";
			echo "<tr>";			
			echo "<td colspan=3 width=300px> &nbsp;&nbsp;&nbsp;&amp;&nbsp;";
				$myCalendar = new tc_calendar("sdate", true);
				$myCalendar->setIcon("calendar/images/iconCalendar.gif");
				$myCalendar->setPath("calendar/");
				$myCalendar->setYearInterval(1970, 2050);
	  			$myCalendar->writeScript();
			echo "</td>";
			echo "<td colspan=3 width=300px>";
				$myCalendar = new tc_calendar("edate", true);
				$myCalendar->setIcon("calendar/images/iconCalendar.gif");
				$myCalendar->setPath("calendar/");
				$myCalendar->setYearInterval(1970, 2050);
	  			$myCalendar->writeScript();
			echo "</td>";
			echo "</tr>";
			
			$sql = "SELECT tests.* from tests,subjects_groups,students where tests.sub_id=subjects_groups.sub_id and subjects_groups.group_id=students.group_id and students.stud_id='$prn' and tests.test_date between '$sdate' and '$edate' order by tests.test_date";
			$result = mysql_query($sql,$con);
			$row=mysql_fetch_row($result);
			
			if(count($row[0])>0)
			{
				echo "<tr>";
				for($i=0;$i<6;$i++)
				{	
					echo "<td align='center'><font style='font-weight:bolder;text-decoration:underline;text-align:center;'>$arr[$i]</font></td>";
				}
				echo "</tr>";			
				$sql = "SELECT tests.* from tests,subjects_groups,students where tests.sub_id=subjects_groups.sub_id and subjects_groups.group_id=students.group_id and students.stud_id='$prn' and tests.test_date between '$sdate' and '$edate' order by tests.test_date";
				$result = mysql_query($sql,$con);
				while($row=mysql_fetch_row($result)) 
				{				
					echo "<tr>";
					for($i=0;$i<5;$i++)
					{
						echo "<td align='center'><font style='text-align:center;'>$row[$i]</font></td>";
					}
					$d=explode("-",$row[5]);
					echo "<td align='center'><font style='text-align:center;'>$d[2]-$d[1]-$d[0]</font></td>";
					echo "</tr>";
				}
			}	
		?>	
		</table>
		</form>
		</center>
	</div>		
</div>
		
<?php
	mysql_close($con);
	include("themes/inc_index_2.inc.php");
?>