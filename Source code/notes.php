<?php
	include("themes/inc_index_1.inc.php");
	if($type!="student")
	{	
		echo "<script>window.location='home.php'</script>";
	}
	$name=$uname;

	$subj=$_POST['subject_chooser'];		
?>	
<div class="div_middle_right_left">
	<div style="margin:10px;">
		<center>
		<?php
		 	echo "<form name='myform' action='notes.php' method='POST' enctype='multipart/form-data'>";
		 ?>		
		<table border="1" width="625px">
			<tr>
			<td colspan="2">
				<select name="subject_chooser" onChange="document.forms['myform'].submit()">
					<option value='other'>Other</option>
					<?php
						$sql = "SELECT sub_id from subjects_groups,students where subjects_groups.group_id=students.group_id and stud_id='$name'";
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
				if($subj!='') 
				{
					$dir="notes/$subj";
					$dd=scandir($dir);
					foreach($dd as $f)
					{
						if($f=="." || $f=="..")
						{
							continue;
						}
						else 
						{
							echo "<tr><td width=350><a href=notes/".$subj."/".$f.">$f</a></td></tr>";
						}
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