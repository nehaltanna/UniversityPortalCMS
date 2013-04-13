<?php
	include("themes/inc_index_1.inc.php");
	if($type!="admin")
	{	
		echo "<script>window.location='home.php'</script>";
	}
	if(isset($_POST['btn_submit'])==true)
	{
				$sql = "SELECT directors_img from directors_desk";
				$result = mysql_query($sql,$con);
				$row = mysql_fetch_row($result);			
				if($_FILES['fileupload1']['name']!="")
  				{
  					$image="images/directors_image/".$_FILES[fileupload1][name];
  					if($image!=$row[0] && $row[0]!="")
  					{
  							unlink($row[0]);
  					}
				}
				else 
				{
						$image=$row[0];
				}
			$sql = "DELETE FROM directors_desk";		
			if (!mysql_query($sql,$con))
  			{
  				die('Error: ' . mysql_error());
  			}
			$sql = "INSERT INTO directors_desk VALUES('$image','$_POST[textarea1]')";
			if (!mysql_query($sql,$con))
  			{
  				die('Error: ' . mysql_error());
  			}
  			
	if (($_FILES["fileupload1"]["type"] == "image/gif")
	|| ($_FILES["fileupload1"]["type"] == "image/jpeg")
	|| ($_FILES["fileupload1"]["type"] == "image/pjpeg")
	|| ($_FILES["fileupload1"]["type"] == "image/jpg")
	|| ($_FILES["fileupload1"]["type"] == "image/png"))
	{
  		 if ($_FILES["fileupload1"]["error"] > 0)
    	 {
   	 	 echo "Return Code: " . $_FILES["fileupload1"]["error"] . "<br />";
    	 }
    	 else
    	 {
    	 	 if (file_exists("images/directors_desk/" . $_FILES["fileupload1"]["name"]))
      	 {
      			echo "file already exist!!";
      	 }
    		 else
      	 {	
      			move_uploaded_file($_FILES["fileupload1"]["tmp_name"],$image);
      	 }
    	}
  }
}
  
$sql = "SELECT directors_img from directors_desk";
$result = mysql_query($sql,$con);
$row = mysql_fetch_row($result);
?> 

<div class="div_middle_right_left">
	<div style="margin:10px;">
	<?php
			echo "<center><img src='$row[0]' alt='image not available' height='200px' width='200px' /></center><br />";
			$sql = "SELECT directors_desk from directors_desk";
			$result = mysql_query($sql,$con);
			$row = mysql_fetch_row($result);
	?>
	select the file you want to upload : 
	<form action="edit_directors_desk.php" method="post" name="myform" enctype="multipart/form-data">
		<input type="file" name="fileupload1" /><br /><br />
	Enter the director's speech :<br>
	
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