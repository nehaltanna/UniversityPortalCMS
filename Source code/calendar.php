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
	
	$cal=$_POST['cal_chooser'];
	$newcal=$_POST['txt_newcal'];
	
	if(isset($_POST['btn_delete'])==true)
	{
		$sql = "delete from calendar_alert where alert_text='$cal'";
  			if (!mysql_query($sql,$con))
  			{
  				die('Error: ' . mysql_error());
  			}
	}
	
	if(isset($_POST['btn_save'])==true)
	{							
  			$sql = "INSERT INTO calendar_alert(alert_text,alert_date) VALUES('$newcal','$_POST[txt_date]')";
  			if (!mysql_query($sql,$con))
  			{
  				die('Error: ' . mysql_error());
  			}
	}
?>	
<div class="div_middle_right_left">
	<div style="margin:10px;">
		<center>
		<?php
		 	echo "<form name='myform' action='calendar.php' method='POST' enctype='multipart/form-data'>";
		 ?>
		 <table border='1' width='625px'>	
		 	<tr>
		 		<td colspan="2">
				<select name="cal_chooser">
					<?php
						$sql = "SELECT alert_text from calendar_alert order by alert_date";
						$result = mysql_query($sql,$con);						
						while($row = mysql_fetch_row($result)) 
						{						 
							foreach($row as &$str)
							{
								if($str==$cal)
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
				&nbsp;&nbsp;<input type="submit" name="btn_delete" value="Remove"> 
			</td>
			</tr>
			<tr>
				<td>Add new one :</td>
				<td> 
				 <input type="text" name="txt_newcal" size=50>
				</td>
			</tr>			
				<tr>
				<td>Date of event : <br /> (dd/mm/yyyy)</td>
				<td>
					<?php
						$myCalendar = new tc_calendar("txt_date", true);
						$myCalendar->setIcon("calendar/images/iconCalendar.gif");
	  					$myCalendar->setPath("calendar/");
	  					$myCalendar->setYearInterval(1970, 2050);
	  					$myCalendar->writeScript();
					?>					 				
				</td>
				</tr>							
		</table>		
		<input type="submit" name="btn_save" value="Add">

		</form>
		</center>
	</div>		
</div>
		
<?php
	mysql_close($con);
	include("themes/inc_index_2.inc.php");
?>