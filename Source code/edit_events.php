<?php
	include("themes/inc_index_1.inc.php");
	if($type!="admin")
	{	
		echo "<script>window.location='home.php'</script>";
	}
	if($_POST['event_chooser']=="other")
	{
				$flag=1;
				$event=$_POST['txt_addnew_event'];
	}
	else 
	{
				$event=$_POST['event_chooser'];	
	}
	if(isset($_POST['btn_delete'])==true)
	{		
			$sql = "SELECT event_img_url from events where event_id='$event'";
			$result = mysql_query($sql,$con);
			$row = mysql_fetch_row($result);
  			unlink($row[0]);
  			rmdir("images/events/$event");
  			
  			$sql = "DELETE FROM events where event_id='$event'";
			$result = mysql_query($sql,$con);
			$row = mysql_fetch_row($result);		
	}	
	if(isset($_POST['btn_submit'])==true)
	{
			$sql = "SELECT event_img_url from events where event_id='$event'";
			$result = mysql_query($sql,$con);
			$row = mysql_fetch_row($result);			
			if($_FILES['fileupload1']['name']!="")
  			{
  					$fileurl="images/events/".$event."/".$_FILES[fileupload1][name];
  					if($fileurl!=$row[0] && $row[0]!="")
  					{
  							unlink($row[0]);
  					}
			}
			else 
			{
					$fileurl=$row[0];
			}
			$sql = "DELETE FROM events where event_id='$event'";		
			if (!mysql_query($sql,$con))
  			{
  				die('Error: ' . mysql_error());
  			}  			
  			$text=str_replace(array('\t'),array("&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"),$_POST['textarea1']);
			$sql = "INSERT INTO events VALUES('$event','$fileurl','$text')";
			if (!mysql_query($sql,$con))
  			{
  				die('Error: ' . mysql_error());
  			}
  			if($flag==1)
  			{
  				mkdir("images/events/$event", 0777);
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
    	 	 	if (file_exists("images/home_page/" . $_FILES["fileupload1"]["name"]))
      	 	{
      			echo "file already exist!!";
      	 	}
    		 	else
      	 	{		
      			move_uploaded_file($_FILES["fileupload1"]["tmp_name"],
      			"images/events/".$event."/" . $_FILES["fileupload1"]["name"]);
      	 	}
    		 }
  			}
	}
?> 

<div class="div_middle_right_left">
	<div style="margin:10px;">
	<center>
	<form action="edit_events.php" method="post" name="myform" enctype="multipart/form-data">
	<table border="1">	
	<tr>
			<td colspan="2">
				<select id="ch_1" name="event_chooser" onChange="document.forms['myform'].submit()">
					<option value='other'>Other</option>
					<?php
						$sql = "SELECT event_id from events";
						$result = mysql_query($sql,$con);
						while($row = mysql_fetch_row($result))
						{
							foreach($row as $str)
							{
								if($str==$event)
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
				&nbsp;&nbsp;Or type the new one : <input id="f1" type="text" name="txt_addnew_event" />
			</td>
		</tr>
		<tr>
		<?php
			$sql = "SELECT event_img_url from events where event_id='$event'";
			$result = mysql_query($sql,$con);
			$row = mysql_fetch_row($result);
			
			echo "<td colspan=2><img src=".$row[0]." height='300px' width='300px' alt='No such photo is set for this event' /></td>";
		?>
		</tr>
		<tr>
		<td width="200px">
			Select the photo for this event :
		</td>
		<td> 
		<input type="file" name="fileupload1" />
		</td>
		</tr>
		<tr>
		<td colspan="2">Enter the text below to be displayed:<br />
		<?php
				$sql = "SELECT event_info from events where event_id='$event'";
				$result = mysql_query($sql,$con);
				$row = mysql_fetch_row($result);
		
			include_once("fckeditor/fckeditor.php");
			$FCKeditor= new FCKeditor('textarea1');
			$FCKeditor->BasePath = 'fckeditor/';
			$FCKeditor->Value = $row[0];
			$FCKeditor->ToolbarSet = "basicplus";
			$FCKeditor->Width='610';
			$FCKeditor->Height='600';
			$FCKeditor->Create();
		?>
		</td>
		</tr>
		</table>
		<input type="submit" name="btn_submit" value="save" />&nbsp;&nbsp;&nbsp;&nbsp;
		<input type="submit" name="btn_reset_changes" value="reset changes" />&nbsp;&nbsp;&nbsp;&nbsp;
		<input type="button" name="btn_reset" value="clear all" onclick="document.myform.textarea1.value='';" />&nbsp;&nbsp;&nbsp;&nbsp;
		<input type="submit" name="btn_delete" value="delete selected" />
	</form>
	</center>
	</div>		
</div>
	
<?php
	include("themes/inc_index_2.inc.php");
?>