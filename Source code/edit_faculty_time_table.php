<?php
	include("themes/inc_index_1.inc.php");
	if($type!="admin"&&$type!="faculty")
	{	
		echo "<script>window.location='home.php'</script>";
	}
	$facl=$_POST['faculty_chooser'];	
	
	if(isset($_POST['btn_submit'])==true)
	{
			$sql = "DELETE FROM faculty_time_table where faculty_id='$facl'";		
			if (!mysql_query($sql,$con))
  			{
  				die('Error: ' . mysql_error());
  			}
			$sql = "INSERT INTO faculty_time_table(faculty_id,ftt_text) VALUES('$facl','$_POST[ftt_text]')";
			if (!mysql_query($sql,$con))
  			{
  				die('Error: ' . mysql_error());
  			}
	}
?> 
<div class="div_middle_right_left">
	<div style="margin:10px;">
	 
	<form action="edit_faculty_time_table.php" method="post" name="myform" enctype="multipart/form-data">
	<br />
	Select Group : 
	<select name="faculty_chooser" onChange="document.forms['myform'].submit()">
		<option value='other'>-Non Selected-</option>
		<?php
				$sql = "SELECT faculty_id from faculties";
				$result = mysql_query($sql,$con);						
				while($row = mysql_fetch_row($result)) 
				{						
					foreach($row as &$str)
					{
						if($str==$facl)
						{
							echo "<option value='$str' selected='true'>$str</option>";	
						}
						else
						{
							echo "<option value='$str'>$str</option>";
						}
					}
				}
				$sql = "SELECT ftt_text from faculty_time_table where faculty_id='$facl'";
				$result = mysql_query($sql,$con);
				$row = mysql_fetch_row($result);
		?>
	</select>
	<br /><br />		
	Time Table :<br>
	<?php
		include_once("fckeditor/fckeditor.php");
		$FCKeditor= new FCKeditor('ftt_text');
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