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
		<table border="0" width="625px" cellpadding="5">
		<?php
		
			$arr=array('Test Name', 'Subject', 'Marks Obtained', 'Class Average', 'Percentile', 'Grade', 'Rank');
			$sql = "SELECT results.test_id,tests.sub_id,obtained_marks,class_avg,percentile,grade,rank from results,tests where results.stud_id='$prn' and results.test_id=tests.test_id order by tests.test_date";
			$result = mysql_query($sql,$con);
			
			echo "<tr>";
			echo "<td colspan=7><h2 style='background-color:#990B09;color:#CCCCCC;text-align:center;'>Test Results</h2></td>";
			echo "</tr>";
				
			echo "<tr>";
			echo "<td width=140px align='center'><font style='font-weight:bolder;text-decoration:underline;text-align:center;'>$arr[0]</font></td>";
			for($i=1;$i<7;$i++)
			{
				echo "<td align='center'><font style='font-weight:bolder;text-decoration:underline;text-align:center;'>$arr[$i]</font></td>";
			}
			echo "</tr>";
									
			while($row = mysql_fetch_row($result)) 
			{				
				echo "<tr>";
				for($i=0;$i<7;$i++)
				{
					echo "<td align='center'><font style='text-align:center;'>$row[$i]</font></td>";
				}
				echo "</tr>";
			}			
			
			echo "</table>";
		?>
		</center>
	</div>		
</div>
		
<?php
	mysql_close($con);
	include("themes/inc_index_2.inc.php");
?>