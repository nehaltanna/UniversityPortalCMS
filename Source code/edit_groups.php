<?php
	include("themes/inc_index_1.inc.php");
	if($type!="admin")
	{	
		echo "<script>window.location='home.php'</script>";
	}	
	
	if($_POST['group_chooser']=="other")
	{
				$group=$_POST['txt_addnew_group'];
	}
	else 
	{
				$group=$_POST['group_chooser'];	
	}
	
	$batch=$_POST['batch_chooser'];
					
	if(isset($_POST['btn_delete'])==true)
	{			
  			$sql = "DELETE FROM groups where group_id='$group'";
  			if (!mysql_query($sql,$con))
  			{
  				die('Error: ' . mysql_error());
  			}
	}
	if(isset($_POST['btn_submit'])==true)
	{				
			if($_POST['txt_addnew_group']!=NULL)
			{
				$sql="INSERT INTO groups VALUES('$group','$_POST[batch_chooser]')";	
			}
			else
			{
				$sql="UPDATE groups SET group_id='$_POST[txt_group]',batch_id='$_POST[batch_chooser]'";
			}			
			if (!mysql_query($sql,$con))
  			{
  				die('Error: ' . mysql_error());
  			}
	}
?>	
<div class="div_middle_right_left">
	<div style="margin:10px;">
		<center>
		<?php
		 	echo "<form name='myform' action='edit_groups.php' method='POST'>";
		 ?>
		<table border="1" width="625px">
			<tr>
			<td colspan="2">
				<select name="batch_chooser" onChange="document.forms['myform'].submit()">
					<option value="other">-Non Selected-</option>
					<?php
						$sql = "SELECT batch_id from batches";
						$result = mysql_query($sql,$con);						
						while($row = mysql_fetch_row($result)) 
						{						
							foreach($row as &$str)
							{
								if($str==$batch)
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
			<td colspan="2">
				<select name="group_chooser" onChange="document.forms['myform'].submit()">
					<option value='other'>Other</option>
					<?php
						$sql = "SELECT group_id from groups where batch_id='$batch'";
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
				&nbsp;&nbsp;Or type the new : <input type="text" name="txt_addnew_group" />
			</td>
			</tr>
			<tr>
				<?php
						$sql = "SELECT * from groups where group_id='$group'";
						$result = mysql_query($sql,$con);
						$row = mysql_fetch_row($result);
	
					if($_POST['group_chooser']!="other" && $_POST['group_chooser']!=NULL) 
					{
						echo "<td>group Name : </td>";
						echo "<td><input type='text' name='txt_group' value='$row[0]' /></td>";
					}
				?>
			</tr>
		</table>
		<input type="submit" name="btn_submit" value="save">&nbsp;&nbsp;&nbsp;
		<input type="submit" name="btn_delete" value="Delete group">
		</form>
		</center>
	</div>		
</div>
		
<?php

	mysql_close($con);
	include("themes/inc_index_2.inc.php");
?>