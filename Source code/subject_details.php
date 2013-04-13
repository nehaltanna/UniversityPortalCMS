<?php
	include("themes/inc_index_1.inc.php");
	if($type!="student")
	{	
		echo "<script>window.location='home.php'</script>";
	}
	$prn=$uname;
	$subj=$_POST['subject_chooser'];		
?>	
<div class="div_middle_right_left">
	<div style="margin:10px;">
		<?php
		 	echo "<form name='myform' action='subject_details.php' method='POST'>";
		 	$field=array('@!@', 'Semester no', 'Subject type', 'Total Credits', 'Total Marks', 'Internal Marks', 'External Marks', 'Internal Evolution', 'External Evolution', 'Topic List', 'Reference Books');
		 ?>
		<center>
		<table border="1" width="625px">
			<tr>
			<td colspan="2">
				<select name="subject_chooser" onChange="document.forms['myform'].submit()">
					<option>-Non-selected-</option>
					<?php
						$sql = "SELECT subjects_groups.sub_id from subjects_groups,students where subjects_groups.group_id=students.group_id and stud_id='$prn'";
						$result = mysql_query($sql,$con);						
						while($row = mysql_fetch_row($result)) 
						{						
							foreach($row as &$str)
							{
								if($str==$subj)
								{
									echo "<option value='$str' selected='true'>$str</option>";	
								}
								else
								{
									echo "<option value='$str'>$str</option>";
								}
							}
						}
					?>
				</select>
			</td>
			</tr>
			<?php
				$sql = "SELECT * from subjects where sub_id='$subj'";
				$result = mysql_query($sql,$con);
				$row=mysql_fetch_row($result);
				
				for($i=1;$i< count($field);$i++)
				{
					echo "<tr><td>".$field[$i]."</td><td width=400>".$row[$i]."</td><tr>";	
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