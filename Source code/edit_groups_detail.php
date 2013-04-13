<?php
	include("themes/inc_index_1.inc.php");
	if($type!="admin")
	{	
		echo "<script>window.location='home.php'</script>";
	}
	$group=$_POST['group_chooser'];

	if(isset($_POST['btn_enroll'])==true)
	{			
			foreach($_POST['chk1'] as $str)
			{	
					$sql="INSERT INTO subjects_groups VALUES('$group','$str')";
					if (!mysql_query($sql,$con))
		  			{
  						die('Error: ' . mysql_error());
  					}			
			}
	}
	if(isset($_POST['btn_drop_out'])==true)
	{
			foreach($_POST['chk2'] as $str)
			{
					$sql="DELETE FROM subjects_groups WHERE sub_id='$str'";
					if (!mysql_query($sql,$con))
		  			{
  						die('Error: ' . mysql_error());
  					}			
			}
	}
?>	
<div class="div_middle_right_left">
	<div style="margin:10px;">
	
		<center>
		<?php
		 	echo "<form name='myform' action='edit_groups_detail.php' method='POST' enctype='multipart/form-data'>";
		 ?>
		<table border="1" width="625px">
			<tr>
			<td colspan="2">
				<select name="group_chooser" onChange="document.forms['myform'].submit()">
					<option>non-selected</option>
					<?php
						$sql = "SELECT group_id from groups";
						$result = mysql_query($sql,$con);						
						while($row = mysql_fetch_row($result))
						{						
							foreach($row as &$str)
							{
								if($str==$group)
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
			<tr>
				<td style="vertical-align: top;"> 
					<h3 style="color:#990B09;text-align:center;">Enrolled Subjects</h3>
					<?php
					$sql = "SELECT sub_id from subjects_groups WHERE group_id='$group'";
					$result = mysql_query($sql,$con);						
					while($row = mysql_fetch_row($result))
					{						
						echo "<input type='checkbox' name=chk2[] value='$row[0]' />&nbsp;$row[0]";
						echo "<br />";
					}
					echo "<br />";
					?>
				</td>
				<td style="vertical-align: top;" width="300px">
					<h3 style="color:#990B09;text-align:center;">All subjects</h3>
					<?php
					$sql = "SELECT sub_id from subjects";
					$result = mysql_query($sql,$con);						
					while($row = mysql_fetch_row($result))
					{						
						echo "<input type='checkbox' name=chk1[] value='$row[0]' />&nbsp;$row[0]";
						echo "<br />";
					}
					echo "<br />";
					?>
				</td>				
			</tr>
			<tr>
				<td align="center"><input type="submit" name="btn_drop_out" value="Drop out selected"></td>
				<td align="center"><input type="submit" name="btn_enroll" value="Enroll selected"></td>
			</tr>
		</table>
		</form>
		</center>
	</div>		
</div>
		
<?php
	mysql_close($con);
	include("themes/inc_index_2.inc.php");
?>