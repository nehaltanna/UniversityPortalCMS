<?php
	include("themes/inc_index_1.inc.php");
	if($type!="admin"&&$type!="faculty")
	{	
		echo "<script>window.location='home.php'</script>";
	}
?>
	<head>
		<script language="javascript" src="calendar/calendar.js"></script>
	</head>
<?php
	require_once('calendar/classes/tc_calendar.php');
	
	function rrmdir($dir)
	{
   		if (is_dir($dir)) 
   		{
     			$objects = scandir($dir);
     			foreach ($objects as $object) 
     			{
       			if ($object != "." && $object != "..") 
       			{
         			if (filetype($dir."/".$object) == "dir")
         			 	rrmdir($dir."/".$object);
         			else 
         				unlink($dir."/".$object);
       			}
     			}
    		 reset($objects);
     		 rmdir($dir);
   		}
 	}
	
	if($_POST['assgn_chooser']=="other")
	{
				$assgn=$_POST['txt_addnew_assgn'];
	}
	else 
	{
				$assgn=$_POST['assgn_chooser'];	
	}
	$sub=$_POST['subject_chooser'];
	
	if(isset($_POST['btn_delete'])==true)
	{
		$sql = "select submission_link from assignments where assgn_id='$assgn'";
  			$result = mysql_query($sql,$con);						
			$row = mysql_fetch_row($result);
  			rrmdir($row[0]);
		$sql = "delete from assignments where assgn_id='$assgn'";
  			if (!mysql_query($sql,$con))
  			{
  				die('Error: ' . mysql_error());
  			}
  		$link="assignments/".$assgn."/";
  		rrmdir($link);
	}
	
	if(isset($_POST['btn_save'])==true)
	{					
		if($_POST['assgn_chooser']=="other")
		{
			$link="assignments/".$assgn."/";			
  			$sql = "INSERT INTO assignments VALUES('$assgn','$sub','$_POST[txt_text]','$_POST[txt_submission_date]','$link')";
  			if (!mysql_query($sql,$con))
  			{
  				die('Error: ' . mysql_error());
  			}
  			mkdir($link,0777);
		}
		else
		{
			$sql = "UPDATE assignments SET sub_id='$sub',assgn_que='$_POST[txt_text]',submission_date='$_POST[txt_submission_date]' where assgn_id='$assgn'";
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
		 	echo "<form name='myform' action='edit_assignments.php' method='POST' enctype='multipart/form-data'>";
		 ?>
		 <table border='1' width='625px'>
		 <tr>
				<td>Select Subject : </td>
				<td> 
				<select name="subject_chooser" onChange="document.forms['myform'].submit()">
					<option value='other'>-Non selected-</option>
					<?php
						$sql = "SELECT sub_id from subjects";
						$result = mysql_query($sql,$con);						
						while($row = mysql_fetch_row($result)) 
						{						 
							foreach($row as &$str)
							{
								if($str==$sub)
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
		 		<td>Select Assignment : </td>
		 		<td>
				<select name="assgn_chooser" onChange="document.forms['myform'].submit()">
					<option value='other'>Other</option>
					<?php
						$sql = "SELECT assgn_id from assignments where sub_id='$sub'";
						$result = mysql_query($sql,$con);						
						while($row = mysql_fetch_row($result)) 
						{						 
							foreach($row as &$str)
							{
								if($str==$assgn)
								{
									echo "<option value='$str' selected='true'>$str</option>";	
								}
								else
								{
									echo "<option value='$str'>$str</option>";
								}
							}
						}
						$sql = "SELECT assgn_que,submission_date,submission_link from assignments where assgn_id='$assgn'";
						$result = mysql_query($sql,$con);						
						$row = mysql_fetch_row($result);
					?>
				</select>
				&nbsp;Or type new: <input type="text" name="txt_addnew_assgn" />
			</td>
			</tr>
			<tr>
			<td colspan="2">Assignment Question :<br />
				<?php
					include_once("fckeditor/fckeditor.php");
					$FCKeditor= new FCKeditor('txt_text');
					$FCKeditor->BasePath = 'fckeditor/';
					$FCKeditor->Value = $row[0];
					$FCKeditor->ToolbarSet = "basicplus";
					$FCKeditor->Width='620';
					$FCKeditor->Height='600';
					$FCKeditor->Create();
				?>
			</td>
			</tr>
			<tr>
				<td>Last Date of Submission : <br /> (dd/mm/yyyy)</td>
				<td>
					<?php
						$d=explode('-',$row[1]);
						$myCalendar = new tc_calendar("txt_submission_date", true);
						$myCalendar->setIcon("calendar/images/iconCalendar.gif");
						$myCalendar->setDate($d[2], $d[1], $d[0]);
	  					$myCalendar->setPath("calendar/");
	  					$myCalendar->setYearInterval(1970, 2050);
	  					$myCalendar->writeScript();
					?>					 				
				</td>
			</tr>	
			<tr>
				<td>Upload Link : </td>
				<td>
					<?php
						echo $row[2];
					?>
				</td>
			</tr>					
		</table>
		<br />
		<input type="submit" name="btn_save" value="Save assignment">&nbsp;&nbsp;&nbsp;
		<input type="submit" name="btn_delete" value="Delete assignment">
		
		</form>
		</center>
	</div>		
</div>
		
<?php
	mysql_close($con);
	include("themes/inc_index_2.inc.php");
?>
