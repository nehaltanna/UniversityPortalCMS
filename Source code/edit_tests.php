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
	
	if($_POST['test_chooser']=="other")
	{
				$test=$_POST['txt_addnew_test'];
	}
	else 
	{
				$test=$_POST['test_chooser'];	
	}
	$sub=$_POST['subject_chooser'];
	
	if(isset($_POST['btn_delete'])==true)
	{
		$sql = "delete from tests where test_id='$test'";
  			if (!mysql_query($sql,$con))
  			{
  				die('Error: ' . mysql_error());
  			}
	}
	
	if(isset($_POST['btn_save'])==true)
	{					
		if($_POST['test_chooser']=="other")
		{			
  			$sql = "INSERT INTO tests VALUES('$test','$sub','$_POST[txt_test_type]','$_POST[evaluation_chooser]','$_POST[txt_total_marks]','$_POST[txt_test_date]')";
  			if (!mysql_query($sql,$con))
  			{
  				die('Error: ' . mysql_error());
  			}
		}
		else
		{
			$sql = "UPDATE tests SET test_id='$_POST[txt_test]',sub_id='$sub',test_type='$_POST[txt_test_type]',evaluation='$_POST[evaluation_chooser]',total_marks='$_POST[txt_total_marks]',test_date='$_POST[txt_test_date]' WHERE test_id='$test'";
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
		 	echo "<form name='myform' action='edit_tests.php' method='POST' enctype='multipart/form-data'>";
		 ?>
		 <table border='1' width='625px'>	
		 	<tr>
		 		<td colspan="2">
				<select name="test_chooser" onChange="document.forms['myform'].submit()">
					<option value='other'>Other</option>
					<?php
						$sql = "SELECT test_id from tests";
						$result = mysql_query($sql,$con);						
						while($row = mysql_fetch_row($result)) 
						{						 
							foreach($row as &$str)
							{
								if($str==$test)
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
				&nbsp;&nbsp;Or type the new one : <input type="text" name="txt_addnew_test" />
			</td>
			</tr>
			<tr>
				<td>Select Subject : </td>
				<td> 
				<select name="subject_chooser">
					<option value='other'>-Non selected-</option>
					<?php
						$sql = "SELECT sub_id from tests where test_id='$test'";
						$result = mysql_query($sql,$con);						
						$row = mysql_fetch_row($result);
						$sub=$row[0];
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
				<?php
					$sql="select * from tests where test_id='$test'";
					$result = mysql_query($sql,$con);						
					$row = mysql_fetch_row($result);
							  
					if($_POST['test_chooser']!="other" && $_POST['test_chooser']!=NULL) 
					{
						echo "<td>Test Name : </td>";
						echo "<td><input type='text' name='txt_test' value='$row[0]' /></td>";
					}
				?>
			</tr>	
			<tr>
				<td>Test type : </td>
				<td>
					<input type="text" name="txt_test_type" value="<?php echo $row[2]; ?>" />
				</td>
			</tr>
				<tr>
					<td>Evaluation : </td>
					<td>
						<select name="evaluation_chooser">
						<?php
							if($row[3]=='internal')
							{
								echo "<option value='none'>none</option>";
								echo "<option value='internal' selected='true'>internal</option>";
								echo "<option value='external'>external</option>";
								echo "<option value='practical'>practical</option>";
							}
							elseif($row[3]=='external')
							{
								echo "<option value='none'>none</option>";
								echo "<option value='internal'>internal</option>";
								echo "<option value='external' selected='true'>external</option>";
								echo "<option value='practical'>practical</option>";
							}
							elseif($row[3]=='practical')
							{
								echo "<option value='none'>none</option>";
								echo "<option value='internal'>internal</option>";
								echo "<option value='external'>external</option>";
								echo "<option value='practical' selected='true'>practical</option>";
							}
							else
							{
								echo "<option value='none' selected='true'>none</option>";
								echo "<option value='internal'>internal</option>";
								echo "<option value='external'>external</option>";
								echo "<option value='practical'>practical</option>";
							}
						?>
						</select>
					</td>
				</tr>
				<tr>
					<td>Total Marks : </td>
					<td>
						<input type="text" name="txt_total_marks" value="<?php echo $row[4]; ?>" />
					</td>
				</tr>
				<tr>
				<td>Date of Test : <br /> (dd/mm/yyyy)</td>
				<td>
					<?php
						$d=explode('-',$row[5]);
						$myCalendar = new tc_calendar("txt_test_date", true);
						$myCalendar->setIcon("calendar/images/iconCalendar.gif");
						$myCalendar->setDate($d[2], $d[1], $d[0]);
	  					$myCalendar->setPath("calendar/");
	  					$myCalendar->setYearInterval(1970, 2050);
	  					$myCalendar->writeScript();
					?>					 				
				</td>
				</tr>							
		</table>
		<br />
		<input type="submit" name="btn_save" value="Save Test">&nbsp;&nbsp;&nbsp;
		<input type="submit" name="btn_delete" value="Delete Test">
		
		</form>
		</center>
	</div>		
</div>
		
<?php
	mysql_close($con);
	include("themes/inc_index_2.inc.php");
?>