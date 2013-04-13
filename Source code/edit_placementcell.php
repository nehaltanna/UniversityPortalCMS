<?php
	include("themes/inc_index_1.inc.php");
	if($type!="admin")
	{	
		echo "<script>window.location='home.php'</script>";
	}
	if(isset($_POST['btn_submit'])==true)
	{
			$sql = "update placement set placement_cell='$_POST[textarea1]'";
			if (!mysql_query($sql,$con))
  			{
  				die('Error: ' . mysql_error());
  			}
	}

$sql = "SELECT placement_cell from placement";
$result = mysql_query($sql,$con);
$row = mysql_fetch_row($result);
?> 

<div class="div_middle_right_left">
	<div style="margin:10px;">
	<form action="edit_placementcell.php" method="post" name="myform" enctype="multipart/form-data">		
	Enter the text :<br>
	<?php
		include_once("fckeditor/fckeditor.php");
		$FCKeditor= new FCKeditor('textarea1');
		$FCKeditor->BasePath = 'fckeditor/';
		$FCKeditor->Value = $row[0];
		$FCKeditor->ToolbarSet = "basicplus";
		$FCKeditor->Width='620';
		$FCKeditor->Height='600';
		$FCKeditor->Create();
	?>
		<input type="submit" name="btn_submit" value="save" />&nbsp;&nbsp;&nbsp;&nbsp;
		<input type="submit" name="btn_reset_changes" value="reset changes" />&nbsp;&nbsp;&nbsp;&nbsp;
	</form>
	</div>		
</div>

<?php
	include("themes/inc_index_2.inc.php");
?>