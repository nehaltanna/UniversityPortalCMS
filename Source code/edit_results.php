<?php
	include("themes/inc_index_1.inc.php");
	 if($type!="admin"&&$type!="faculty")
	{	
		echo "<script>window.location='home.php'</script>";
	}
	$test=$_POST['test_chooser'];
	
	$sql = "SELECT total_marks from tests Where test_id='$test'";
	$result = mysql_query($sql,$con);						
	$row = mysql_fetch_row($result);
	
	$tmarks=$row[0];
	
	if(isset($_POST['btn_save'])==true)
	{	
		$sql = "DELETE from results where test_id='$test'";
	  		if (!mysql_query($sql,$con))
  			{
  				die('Error: ' . mysql_error());
  			}
  		$sql = "DELETE from backup_results where test_id='$test'";
	  		if (!mysql_query($sql,$con))
  			{
  				die('Error: ' . mysql_error());
  			}
		$no=$_POST['no'];
		$sum=0;
		for($i=0;$i<$no;$i++)
		{
			$prn[$i]=$_POST["studid$i"];
			$omarks[$i]=$_POST["marks$i"];
			$sum=$sum+$omarks[$i];			
			$per[$i]=(($omarks[$i]*100)/$tmarks);
		}						
		$avg=$sum/$no;
		for($i=0;$i<$no;$i++)
		{
			$p=$prn[$i];
			$o=$omarks[$i];
			$pe=$per[$i];
			//echo "$test aa $p aa $o aa $avg aa $pe \n";
			$sql = "INSERT INTO results(test_id,stud_id,obtained_marks,class_avg,percentile) VALUES('$test','$p','$o','$avg','$pe')";
	  		if (!mysql_query($sql,$con))
  			{
  				die('Error: ' . mysql_error());
  			}
			$sql = "INSERT INTO backup_results(test_id,stud_id,obtained_marks,class_avg,percentile) VALUES('$test','$p','$o','$avg','$pe')";
	  		if (!mysql_query($sql,$con))
  			{
  				die('Error: ' . mysql_error());
  			}
		}			
		$rank=0;
		$div=ceil($no/10);	
		for($i=0;$i<10;$i++)
		{
			$temp[$i]=$div;
			$div=$div+$div;	
		}
  		$sql = "select stud_id from results where test_id='$test' order by obtained_marks DESC";
  		$result = mysql_query($sql,$con);						
		while($row = mysql_fetch_row($result))
		{
				$rank++;								
				if($rank<$temp[0]) 
				{
					$grade="A+";
				}
				elseif($rank<$temp[1]) 
				{
					$grade="A";
				}
				elseif($rank<$temp[2]) 
				{
					$grade="A-";
				}
				elseif($rank<$temp[3]) 
				{
					$grade="B+";
				}
				elseif($rank<$temp[4]) 
				{
					$grade="B";
				}
				elseif($rank<$temp[5]) 
				{
					$grade="B-";
				}
				elseif($rank<$temp[6]) 
				{
					$grade="C+";
				}
				elseif($rank<$temp[7]) 
				{
					$grade="C";
				}
				elseif($rank<$temp[8]) 
				{
					$grade="C-";
				}
				else 
				{
					$grade="F";
				}
				$sql = "update results set grade='$grade',rank='$rank' where stud_id='$row[0]' and test_id='$test'";
	  			if (!mysql_query($sql,$con))
  				{
  					die('Error: ' . mysql_error());
  				}
  				$sql = "update backup_results set grade='$grade',rank='$rank' where stud_id='$row[0]' and test_id='$test'";
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
		<table border='0' width='625px'>		
		<?php
		 	echo "<form name='myform' action='edit_results.php' method='POST' enctype='multipart/form-data'>";
		 ?>
			<tr>
		 		<td colspan="2">
				<select name="test_chooser" onChange="document.forms['myform'].submit()">
					<option value='other'>-Non Selected-</option>
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
				</td>
			</tr>				
			<tr>
				<td>Subject Name : </td>
				<td width="300px">
					<?php
						$sql="select sub_id from tests where test_id='$test'";
						$result = mysql_query($sql,$con);						
						$row = mysql_fetch_row($result);
						$sub=$row[0];
						echo "<input type='text' value='$sub' readOnly>";   
					?>
				</td>
			</tr>				
			</table>	
			
			<br />
			<table border='1' width='625px'>				
			<?php						
				$sql = "SELECT stud_id from students,subjects_groups WHERE students.group_id=subjects_groups.group_id and sub_id='$sub' order by stud_id";
				$result = mysql_query($sql,$con);
				$arr=array();						
				while($row = mysql_fetch_row($result))
				{
					array_push($arr,$row[0]);
				}
				echo "<tr><td>PRN</td>";
				echo "<td>Marks Obtained</td></tr>";
				$no=count($arr);
				$sql = "SELECT obtained_marks from results WHERE test_id='$test'";
				$result = mysql_query($sql,$con);
				$arr1=array();						
				while($row = mysql_fetch_row($result))
				{
					array_push($arr1,$row[0]);
				}
				for($i=0;$i<$no;$i++) 
				{
					echo "<tr><td><input type='text' name=studid".$i." value=".$arr[$i]." readOnly /></td>";
					echo "<td><input type='text' name=marks".$i." value=".$arr1[$i]."></td></tr>";
				}
				echo "<input type='hidden' name='no' value='$no' />";				
			?>
			</table>
		<input type="submit" name="btn_save" value="Save Result">&nbsp;&nbsp;&nbsp;
		<input type="button" name="btn_clear" value="Clear All" onclick="this.form.reset();">
		
		</form>
	</center>
	</div>		
</div>

<?php
	mysql_close($con);
	include("themes/inc_index_2.inc.php");
?>