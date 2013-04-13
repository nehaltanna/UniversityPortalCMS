<?php
	include("themes/inc_index_1.inc.php");
?>

<div class="div_middle_right_left">
	<div style="margin:10px;">	
	
	<script type="text/javascript">
	function newWin(tt)
	{
		window.open("details_faculty.php?fid="+tt,'popUpWindow','height=300,width=500,left=400,top=200,resizable=yes,scrollbars=yes,toolbar=no,menubar=no,location=no,directories=no,status=no');	
	}
	</script>
		<center>
			<h3 style='background-color:#990B09;color:#CCCCCC;text-align:center;'>Permanent Faculties</h3>
			<?php
					
				$array=array('Director','Deputy Director','Professor','Associate Professor','Assistant Professor','Other');					
					
				foreach($array as $str)
				{
					echo "<h2 style='color:#990B09;text-decoration:underline;'>$str</h2>";
					$sql = "SELECT faculty_id from faculties where faculty_type='permanent' and designation='$str'";
					$result = mysql_query($sql,$con);						
					$row1 = mysql_fetch_row($result); 
																		
					foreach($row1 as &$str1)
					{
						echo "<a href='JavaScript:newWin(\"$str1\");' style='color:#000000;text-decoration:underline;'>$str1</a><br />";
					}
				}
			?>
			
			<h3 style='background-color:#990B09;color:#CCCCCC;text-align:center;'>Visiting Faculties</h3>
			<div style="float:left;">
			<?php
			
				$sql = "SELECT faculty_id from faculties where faculty_type='visiting'";
				$result = mysql_query($sql,$con);						
				$row = mysql_fetch_row($result);
				 														
				foreach($row as &$str)
				{
					echo "<a href='JavaScript:newWin(\"$str\");' style='color:#000000;text-decoration:underline;'>$str</a><br />";
				}
			?>
		</center>
	</div>		
</div>
<?php

	mysql_close($con);
	include("themes/inc_index_2.inc.php");
?>


