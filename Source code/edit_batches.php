<?php
	include("themes/inc_index_1.inc.php");
	if($type!="admin")
	{	
		echo "<script>window.location='home.php'</script>";
	}
	
	if($_POST['batch_chooser']=="other")
	{
				$batch=$_POST['txt_addnew_batch'];
	}
	else 
	{
				$batch=$_POST['batch_chooser'];	
	}
	
	$prj=$_POST['programme_chooser'];
					
	if(isset($_POST['btn_delete'])==true)
	{			
  			$sql = "DELETE FROM batches where batch_id='$batch'";
  			if (!mysql_query($sql,$con))
  			{
  				die('Error: ' . mysql_error());
  			}
	}
	if(isset($_POST['btn_submit'])==true)
	{				
			if($_POST['txt_addnew_batch']!=NULL)
			{
				$sql="INSERT INTO batches VALUES('$batch','$_POST[programme_chooser]')";	
			}
			else
			{
				$sql="UPDATE batches SET batch_id='$_POST[txt_batch]',prg_id='$_POST[programme_chooser]'";
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
		 	echo "<form name='myform' action='edit_batches.php' method='POST'>";
		 ?>
		<table border="1" width="625px">
			<tr>
			<td colspan="2">
				<select name="programme_chooser" onChange="document.forms['myform'].submit()">
					<?php
						$sql = "SELECT prg_id from programmes";
						$result = mysql_query($sql,$con);						
						while($row = mysql_fetch_row($result)) 
						{						
							foreach($row as &$str)
							{
								if($str==$prj)
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
				<select name="batch_chooser" onChange="document.forms['myform'].submit()">
					<option value='other'>Other</option>
					<?php
						$sql = "SELECT batch_id from batches where prg_id='$prj'";
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
				&nbsp;&nbsp;Or type the new one : <input type="text" name="txt_addnew_batch" />
			</td>
			</tr>
			<tr>
				<?php
						$sql = "SELECT * from batches where batch_id='$batch'";
						$result = mysql_query($sql,$con);
						$row = mysql_fetch_row($result);
	
					if($_POST['batch_chooser']!="other" && $_POST['batch_chooser']!=NULL) 
					{
						echo "<td>batch Name : </td>";
						echo "<td><input type='text' name='txt_batch' value='$row[0]' /></td>";
					}
				?>
			</tr>
		</table>
		<input type="submit" name="btn_submit" value="save">&nbsp;&nbsp;&nbsp;
		<input type="submit" name="btn_delete" value="Delete batch">
		</form>
		</center>
	</div>		
</div>
		
<?php

	mysql_close($con);
	include("themes/inc_index_2.inc.php");
?>