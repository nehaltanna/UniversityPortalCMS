<?php
	include("themes/inc_index_1.inc.php");
	if($type!="admin")
	{	
		echo "<script>window.location='home.php'</script>";
	}
	if(isset($_POST['btn_addnew'])==true)
	{			
			$passwd=sha1("sicsr123");
  			$sql = "INSERT INTO faculties(faculty_id,faculty_passwd) VALUES('$_POST[txt_faculty]','$passwd')";
  			if (!mysql_query($sql,$con))
  			{
  				die('Error: ' . mysql_error());
  			}
	}
	if(isset($_POST['btn_deleteselected'])==true)
	{
			foreach($_POST['chk1'] as $str)
			{
					$sql = "SELECT faculty_photo from faculties WHERE faculty_id='$str'";
					$result = mysql_query($sql,$con);						
					$row = mysql_fetch_row($result);
					unlink("$row[0]");
					
					$sql="DELETE FROM faculties WHERE faculty_id='$str'";
					if (!mysql_query($sql,$con))
		  			{
  						die('Error: ' . mysql_error());
  					}			
			}
	}
	if(isset($_POST['btn_setpasswd'])==true)
	{
			$passwd=sha1("sicsr123");
			foreach($_POST['chk1'] as $str)
			{		
					$sql="UPDATE faculties SET faculty_passwd='$passwd' WHERE faculty_id='$str'";
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
		 	echo "<form name='myform' action='edit_manage_faculties.php' method='POST' enctype='multipart/form-data'>";
		 ?>
		<table border="1" width="625px">
			Enter new name (User Id) :&nbsp;&nbsp;&nbsp; <input type="text" name="txt_faculty" />&nbsp;&nbsp;&nbsp;
			<input type="submit" name="btn_addnew" value="Add New" />
			<br /><br />
			<?php
					$sql = "SELECT faculty_id from faculties";
					$result = mysql_query($sql,$con);						
					while($row = mysql_fetch_row($result))
					{
						echo "<tr><td><input type='checkbox' name=chk1[] value='$row[0]' /></td>";	
						echo "<td>$row[0]</td>";
						echo "<td><a href='details_faculties.php?fid=".$row[0]."' target='_blank'>See Details</a></td></tr>";
					}				
			?>
		</table>
		<input type="submit" name="btn_deleteselected" value="Delete Selected">&nbsp;&nbsp;&nbsp;
		<input type="submit" name="btn_setpasswd" value="Reset Password for selected">
		</form>
		</center>
	</div>		
</div>
		
<?php
	mysql_close($con);
	include("themes/inc_index_2.inc.php");
?>