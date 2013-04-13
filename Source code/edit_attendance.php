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
	
	$group=$_POST['group_chooser'];
	
	$sdate=$_POST['sdate'];
	$edate=$_POST['edate'];
	
	if(isset($_POST['btn_fill'])==true)
	{
		$sql="SELECT distinct attendance.sub_id,total_lectures FROM attendance,subjects_groups WHERE attendance.sub_id=subjects_groups.sub_id and start_date='$sdate' and end_date='$edate' and subjects_groups.group_id='$group'";
		$result = mysql_query($sql,$con);
		$t=array();					
		while($row = mysql_fetch_row($result))
		{
				array_push($t,$row[1]);
		}
		$sql = "SELECT stud_id from students WHERE group_id='$group'";
		$result = mysql_query($sql,$con);
		$st=array();					
		while($row = mysql_fetch_row($result))
		{
				array_push($st,$row[0]);
		}
		$mk=array();
		foreach($st as $str)
		{
			$sql = "SELECT no_absent from attendance WHERE stud_id='$str' and start_date='$sdate' and end_date='$edate'";
			$result = mysql_query($sql,$con);					
			while($row = mysql_fetch_row($result))
			{
					array_push($mk,$row[0]);
			}		
		}	
	}	
	if(isset($_POST['btn_save'])==true)
	{	
		$no=$_POST['no'];
		$no1=$_POST['no1'];
		$students=array();
		$subjects=array();
		$total=array();
		
		for($i=0;$i<$no1;$i++)
		{
			array_push($students,$_POST["student$i"]);
		}
		for($i=0;$i<$no;$i++)
		{
			array_push($subjects,$_POST["subjects$i"]);
			array_push($total,$_POST["total$i"]);
		}
		
		for($i=0;$i<$no1;$i++)
		{
				for($j=0;$j<$no;$j++) 
				{
					$a=$students[$i];
					$b=$subjects[$j];
					$c=$total[$j];
					$d=$_POST[$subjects[$j]."_$i"];
										
					$sql="delete from attendance where stud_id='$a' and sub_id='$b' and start_date='$sdate' and end_date='$edate'";
					if (!mysql_query($sql,$con))
	  				{
  						die('Error: ' . mysql_error());
  					}
  					
					$sql="insert into attendance(stud_id,sub_id,total_lectures,no_absent,start_date,end_date) values('$a','$b','$c','$d','$sdate','$edate')";
					if (!mysql_query($sql,$con))
		  			{
  						die('Error: ' . mysql_error());
  					}
				}		
		}
	}
?>	
<div class="div_middle_right_left">
	<div style="margin:10px;">
	<center>
		<table border='0' width='625px'>		
		<?php
		 	echo "<form name='myform' action='edit_attendance.php' method='POST' enctype='multipart/form-data'>";
		 ?>
		 	<tr>
			<td colspan="2">
				<select name="group_chooser" onChange="document.forms['myform'].submit()">
					<option value='other'>-Non Selected-</option>
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
			</td>
			</tr>
			<?php
				echo "<tr><td>Start Date :</td>";			
				echo "<td width=400px>";
					$d=explode('-',$sdate);
					$myCalendar = new tc_calendar("sdate", true);
					$myCalendar->setIcon("calendar/images/iconCalendar.gif");
					$myCalendar->setDate($d[2], $d[1], $d[0]);
					$myCalendar->setPath("calendar/");
					$myCalendar->setYearInterval(1970, 2050);
		  			$myCalendar->writeScript();
				echo "</td></tr>";
				echo "<tr><td>End Date :</td>";			
				echo "<td width=400px>";
					$d=explode('-',$edate);
					$myCalendar = new tc_calendar("edate", true);
					$myCalendar->setIcon("calendar/images/iconCalendar.gif");
					$myCalendar->setDate($d[2], $d[1], $d[0]);
					$myCalendar->setPath("calendar/");
					$myCalendar->setYearInterval(1970, 2050);
		  			$myCalendar->writeScript();
				echo "</td></tr>";
				
				$sql = "SELECT sub_id from subjects_groups WHERE group_id='$group'";
				$result = mysql_query($sql,$con);
				$arr=array();					
				while($row = mysql_fetch_row($result))
				{
						array_push($arr,$row[0]);
				}
			?>		
			</table>
			<br />
				<input type="submit" name="btn_fill" value="Fill the data">	
			<br />
			<br />
			Total No of Lectures :
			<table border='1' width='625px'>				
			<?php
				$no=count($arr);
				echo "<tr>";
				echo "<td>&nbsp;</td>";
				for($i=0;$i<$no;$i++) 
				{
					echo "<td><input type=hidden name=subjects".$i." value=$arr[$i]>$arr[$i]</td>";
				}
				echo "</tr>";
				echo "<tr>";
				echo "<td width=115px>Total</td>";
				for($i=0;$i<$no;$i++) 
				{
					echo "<td><input type=text name=total".$i." size=2 value=".$t[$i]."></td>";
					echo "$t[$i]";
				}
				echo "</tr>";
				echo "</table>";
			?>
			<br />
			<?php
				$sql = "SELECT stud_id from students WHERE group_id='$group' order by stud_id";
				$result = mysql_query($sql,$con);
				$arr1=array();					
				while($row = mysql_fetch_row($result))
				{	
					array_push($arr1,$row[0]);
				}		
				echo "<table border='1' width='625px'>	";
				$no1=count($arr1);
				$cnt=0;
				for($i=0;$i<$no1;$i++)
				{
					echo "<tr>";
					echo "<td width=20px><input type=text name=student".$i." value=$arr1[$i] size=11 readOnly></td>";
					for($j=0;$j<$no;$j++) 
					{
						echo "<td><input type=text name=".$arr[$j]."_$i"." size=2 value=$mk[$cnt]></td>";
						$cnt++;
					}
					echo "</tr>";
				}
				echo "<input type='hidden' name='no' value='$no' />";
				echo "<input type='hidden' name='no1' value='$no1' />";				
			?>
			</table>
		<input type="submit" name="btn_save" value="Save attendence">&nbsp;&nbsp;&nbsp;
		<input type="button" name="btn_clear" value="Clear All" onclick="this.form.reset();">
		
		</form>
	</center>
	</div>		
</div>

<?php
	mysql_close($con);
	include("themes/inc_index_2.inc.php");
?>
