<?php
	include("themes/inc_index_1.inc.php");
	
	if($type!="student")
	{	
		echo "<script>window.location='home.php'</script>";
	}
	$name=$uname;
	$assgn=$_POST['assgn_chooser'];	
	$sub=$_POST['subject_chooser'];
	
	if(isset($_POST['upload'])==true)
	{
  		if ($_FILES["fileupload1"]["error"] > 0)
 		{
			echo "Return Code: " . $_FILES["fileupload1"]["error"] . "<br />";
		}
		else
		{
			if (file_exists("assignemnts/".$assgn."/".$name."_" . $_FILES["fileupload1"]["name"]))
			{
				echo "file already exist!!";
			}
			else
  			{		
				move_uploaded_file($_FILES["fileupload1"]["tmp_name"],
				"assignments/".$assgn."/".$name."_" . $_FILES["fileupload1"]["name"]);
				echo "<script>alert('uploaded succsessfully.');</script>";
			}
		}					
	}
?>	
<div class="div_middle_right_left">
	<div style="margin:10px;">
		<center>
		<?php
		 	echo "<form name='myform' action='assignments.php' method='POST' enctype='multipart/form-data'>";
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
			</td>
			</tr>
			<tr>
			<td colspan="2">Assignment Question :<br />
				<?php
					echo $row[0];
				?>
			</td>
			</tr>
			<tr>
				<td>Last Date of Submission : <br /> (dd/mm/yyyy)</td>
				<td>
					<?php
						$d=explode('-',$row[1]);
						echo "$d[2] - $d[1] - $d[0]";
					?>					 				
				</td>
			</tr>	
			<tr>
				<td>Upload Here : </td>
				<td>
					<?php
						echo "<input type=file name=fileupload1>&nbsp;&nbsp;<input type=submit name=upload value=upload>";
					?>
				</td>
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