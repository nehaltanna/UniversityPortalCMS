<?php
	include("themes/inc_index_1.inc.php");
	
	$prgm=$_GET['cid'];
?>	
<div class="div_middle_right_left">
	<div style="margin:10px;">
		<center>
		<?php
			$sql = "SELECT max(subjects.sem_no) from subjects,subjects_groups,groups,batches,programmes where programmes.prg_id='$prgm' and subjects.sub_id=subjects_groups.sub_id and subjects_groups.group_id=groups.group_id and groups.batch_id=batches.batch_id and batches.prg_id=programmes.prg_id";
			$result = mysql_query($sql,$con);						
			$row = mysql_fetch_row($result);
			$semester=$row[0];
		?>
		<table border="0" width="620px">
		<?php
			for($i=1;$i<=$semester;$i++)
			{				
				echo "<tr>";
				echo "<td colspan='3'><h3 style='background-color:#990B09;color:#CCCCCC;text-align:center;'>Semester $i</h3></td>";
				echo "</tr>";
				
				echo "<tr>";
				echo "<td colspan='3'><font style='text-decoration:underline;font-weight:bolder;color:#990B09;text-align:center;'>Main Subjects</font></td>";
				echo "</tr>";
				
				echo "<tr>";
				$sql = "SELECT subjects.sub_id,subjects.sub_type from subjects,subjects_groups,groups,batches,programmes where programmes.prg_id='$prgm' and subjects.sub_id=subjects_groups.sub_id and subjects_groups.group_id=groups.group_id and groups.batch_id=batches.batch_id and batches.prg_id=programmes.prg_id and subjects.sem_no='$i' and subjects.sub_type='main'";
				$result = mysql_query($sql,$con);						
				while($row = mysql_fetch_row($result)) 
				{	
						echo "<tr>";					
						foreach($row as &$str)
						{
							echo "<td>$str</td>";
						}
						echo "</tr>";
				}
				echo "</tr>";
				
				echo "<tr>";
				echo "<td colspan='3'><font style='text-decoration:underline;font-weight:bolder;color:#990B09;text-align:center;'><br />Elective Subjects</font></td>";
				echo "</tr>";
				
				echo "<tr>";
				$sql = $sql = "SELECT subjects.sub_id,subjects.sub_type from subjects,subjects_groups,groups,batches,programmes where programmes.prg_id='$prgm' and subjects.sub_id=subjects_groups.sub_id and subjects_groups.group_id=groups.group_id and groups.batch_id=batches.batch_id and batches.prg_id=programmes.prg_id and subjects.sem_no='$i' and subjects.sub_type='elective'";
				$result = mysql_query($sql,$con);						
				while($row = mysql_fetch_row($result)) 
				{	
						echo "<tr>";					
						foreach($row as &$str)
						{
							echo "<td>$str</td>";
						}
						echo "</tr>";
				}
				echo "</tr>";							
			}
		?>	
		</table>
		</center>
	</div>		
</div>
<?php

	mysql_close($con);
	include("themes/inc_index_2.inc.php");
?>


