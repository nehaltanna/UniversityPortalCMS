<?php
	include("themes/inc_index_1.inc.php");
	if($type!="admin")
	{	
		echo "<script>window.location='home.php'</script>";
	}
	$group=$_POST['group_chooser'];
	$mode=$_POST['mode_chooser'];
						
	if(isset($_POST['btn_addnew_1'])==true)
	{			
			$passwd=sha1($_POST['txt_students']);
  			$sql = "INSERT INTO students(stud_id,group_id,student_passwd) VALUES('$_POST[txt_students]','$group','$passwd')";
  			if (!mysql_query($sql,$con))
  			{
  				die('Error: ' . mysql_error());
  			}
	}
	if(isset($_POST['btn_addnew_2'])==true)
	{		
			if($_POST['txt_students_1'] < $_POST['txt_students_2'])
			{
				for($i=($_POST['txt_students_1']);$i<=($_POST['txt_students_2']);$i++)
				{
					$passwd=sha1($i);
					$sql = "INSERT INTO students(stud_id,group_id,student_passwd) VALUES('$i','$group','$passwd')";
					if (!mysql_query($sql,$con))
  					{
	  					die('Error: ' . mysql_error());
  					}
				}		
  			}
  			else 
  			{
  				echo "<script>alert('Invalid Range!!!');</script>";	
  			}
	}
	if(isset($_POST['btn_deleteselected'])==true)
	{
			foreach($_POST['chk1'] as $str)
			{
					$sql = "SELECT student_photo from students WHERE stud_id='$str'";
					$result = mysql_query($sql,$con);						
					$row = mysql_fetch_row($result);
					unlink("$row[0]");
					
					$sql="DELETE FROM students WHERE stud_id='$str'";
					if (!mysql_query($sql,$con))
		  			{
  						die('Error: ' . mysql_error());
  					}			
			}
	}
	if(isset($_POST['btn_setpasswd'])==true)
	{
			
			foreach($_POST['chk1'] as $str)
			{
					$passwd=sha1($str);		
					$sql="UPDATE students SET student_passwd='$passwd' WHERE stud_id='$str'";
					if (!mysql_query($sql,$con))
		  			{
  						die('Error: ' . mysql_error());
  					}			
			}
	}
?>	
<div class="div_middle_right_left">
	<div style="margin:10px;">	
		<?php
		 	echo "<form name='myform' action='edit_manage_students.php' method='POST' enctype='multipart/form-data'>";
		 ?>
			Select Group : &nbsp;&nbsp; 
			<select name="group_chooser" onChange="document.forms['myform'].submit()">
				<option value='other'>-Non selected-</option>
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
		<br /><br />
			Choose Mode : &nbsp;&nbsp;
			<select name="mode_chooser" onChange="document.forms['myform'].submit()">
				<option value='other'>-Non selected-</option>
				<?php
					if($mode=='single') 
					{
						echo "<option value='single' selected='true'>Single</option>";
						echo "<option value='multiple'>Multiple</option>";
					}
					elseif($mode=='multiple') 
					{
						echo "<option value='single'>Single</option>";
						echo "<option value='multiple' selected='true'>Multiple</option>";
					}
					else 
					{
						echo "<option value='single'>Single</option>";
						echo "<option value='multiple'>Multiple</option>";												
					}	
				?>
			</select>
			<br /><br />
			<?php
				echo "<center>";
				echo "<table border='1' width='625px'>";
				if($mode=='single') 
				{
					echo "Enter PRN (User Id) :&nbsp;&nbsp;&nbsp; <input type='text' name='txt_students' />&nbsp;&nbsp;&nbsp";
					echo "<input type='submit' name='btn_addnew_1' value='Add New' /><br /><br />";
				}
				elseif($mode=='multiple')
				{
					echo "Enter (User Id) from PRN : <input type='text' name='txt_students_1' size=15 /> To PRN  <input type='text' name='txt_students_2' size=15 />";
					echo "<br /><input type='submit' name='btn_addnew_2' value='Add New' /><br /><br />";
				}
				else 
				{
					echo "choose selection mode to add student/students<br /><br />";
				}			
				
					$sql = "SELECT stud_id from students WHERE group_id='$group'";
					$result = mysql_query($sql,$con);						
					while($row = mysql_fetch_row($result))
					{
						echo "<tr><td><input type='checkbox' name=chk1[] value='$row[0]' /></td>";	
						echo "<td>$row[0]</td>";
						echo "<td><a href='details_students.php?sid=".$row[0]."' target='_blank'>See Details</a></td></tr>";
					}				
			?>
		</table>
		
		<input type="submit" name="btn_deleteselected" value="Delete Selected">&nbsp;&nbsp;&nbsp;
		<input type="submit" name="btn_setpasswd" value="Reset Password for selected">
		</center>
		</form>
	</div>		
</div>
		
<?php
	mysql_close($con);
	include("themes/inc_index_2.inc.php");
?>