<?php
	include("themes/inc_index_1.inc.php");
	/*if($type!="admin"&&$type!="faculty")
	{	
		echo "<script>window.location='home.php'</script>";
	}*/
	$group=$_POST['group_chooser'];	
	
	if(isset($_POST['btn_submit'])==true)
	{
			$sql = "DELETE FROM time_table where group_id='$group'";		
			if (!mysql_query($sql,$con))
  			{
  				die('Error: ' . mysql_error());
  			}
			$sql = "INSERT INTO time_table(group_id,tt_text) VALUES('$group','$_POST[tt_text]')";
			if (!mysql_query($sql,$con))
  			{
  				die('Error: ' . mysql_error());
  			}
	}
?> 
<div class="div_middle_right_left">
	<div style="margin:10px;">
	 
	<form action="edit_time_table.php" method="post" name="myform" enctype="multipart/form-data">
	<br />
	Select Group : 
	<select name="group_chooser" onChange="document.forms['myform'].submit()">
		<option value='other'>-Non Selected-</option>
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
				$sql = "SELECT tt_text from time_table where group_id='$group'";
				$result = mysql_query($sql,$con);
				$row = mysql_fetch_row($result);
		?>
	</select>
	<br /><br />		
	Time Table :<br>
	<?php
		include_once("fckeditor/fckeditor.php");
		$FCKeditor= new FCKeditor('tt_text');
		$FCKeditor->BasePath = 'fckeditor/';
		$FCKeditor->Value = $row[0];
		$FCKeditor->ToolbarSet = "basicplus";
		$FCKeditor->Width='620';
		$FCKeditor->Height='600';
		$FCKeditor->Create();
	?>
		<input type="submit" name="btn_submit" value="Save" />&nbsp;&nbsp;&nbsp;&nbsp;
		<input type="submit" name="btn_reset_changes" value="reset changes" />
	</form>
	</div>		
</div>

<?php
	include("themes/inc_index_2.inc.php");
?>
