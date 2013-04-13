<?php
	include("themes/inc_index_1.inc.php");
	if($type!="admin")
	{	
		echo "<script>window.location='home.php'</script>";
	}
	$stud=$_GET['sid'];

?>	
<div class="div_middle_right_left">
	<div style="margin:10px;">
		<center>
		<table border="1" width="625px">
				<?php
						$sql = "SELECT * from students where stud_id='$stud'";
						$result = mysql_query($sql,$con);
						$row = mysql_fetch_row($result);
	
					//if($_POST['faculty_chooser']!="other" && $_POST['faculty_chooser']!=NULL) 
					//{
						echo "<td>Student PRN : </td>";
						echo "<td> $row[0] </td>";
					//}
				?>
			</tr>
			<tr>
				<td>Student Group : </td>
				<td>
				<?php
						echo "$row[1]";
				?>
				</td>
			</tr>
			<tr>
				<td>First Name : </td>
				<td>
				<?php
						echo $row[3];
				?>
				</td>
			</tr>
			<tr>
				<td>Last Name : </td>
				<td>
				<?php
						echo $row[4];
				?>
				</td>
			</tr>
			<tr>
				<td>Marital Status : </td>
				<td>
					<?php
						echo $row[5];
					?>
				</td>				
			</tr>
			<tr>
				<td>Gender : </td>
				<td>
					<?php
						echo $row[6];
					?>
				</td>				
			</tr>
			
			<tr>
				<td>DOB : <br /> (dd/mm/yyyy)</td>
				<td>
					<?php
						$d=explode('-',$row[7]);
						echo $d[2]."-".$d[1]."-".$d[0];
					?>					 				
				</td>
			</tr>
			<tr>
				<td>Student photo : </td>
				<td>
				<?php
						echo "<img src='$row[8]' class='profile_pic' alt='Photo not available' /><br />";
				?>
				</td>
			</tr>
			<tr>
				<td>Qualification : </td>
				<td>
				<?php
						echo $row[9];
				?>
				</td>
			</tr>
			<tr>
				<td>Expertise Area:</td>
				<td>
				<?php
						echo $row[10];
				?>
				</td>
			</tr>
			<tr>
				<td>Extra activities:</td>
				<td>
				<?php
						echo $row[11];
				?>
				</td>
			</tr>
			<tr>
				<td>List of Interest:</td>
				<td>
				<?php
						echo $row[12];
				?>
				</td>
			</tr>
			<tr>
				<td>Experience : </td>
				<td>
				<?php
						echo $row[13];
				?>
				</td>
			</tr>
			<tr>
				<td>Contact No : </td>
				<td>
				<?php
						echo $row[14];
				?>
				</td>
			</tr>
			<tr>
				<td>Residence No : </td>
				<td>
				<?php
						echo $row[15];
				?>
				</td>
			</tr>
			<tr>
				<td>Email ID : </td>
				<td>
				<?php
						echo $row[16];
				?>
				</td>
			</tr>
			<tr>
				<td>Address : </td>
				<td>
				<?php
						echo $row[17];
				?>
				</td>
			</tr>
			<tr>
				<td>City : </td>
				<td>
				<?php
						echo $row[18];
				?>
				</td>
			</tr>
			<tr>
				<td>State : </td>
				<td>
				<?php
						echo $row[19];
				?>
				</td>
			</tr>
			<tr>
				<td>Local Address : </td>
				<td>
				<?php
						echo $row[20];
				?>
				</td>
			</tr>
		</table>
		</center>
	</div>		
</div>
		
<?php
	mysql_close($con);
	include("themes/inc_index_2.inc.php");
?>

