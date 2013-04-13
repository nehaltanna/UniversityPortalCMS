<?php
	include("themes/inc_index_1.inc.php");
	if($type!="admin")
	{	
		echo "<script>window.location='home.php'</script>";
	}
	$facl=$_GET['fid'];
?>	
<div class="div_middle_right_left">
	<div style="margin:10px;">
		<center>
		<table border="0" width="625px">
			<tr>
				<?php
						$sql = "SELECT * from faculties where faculty_id='$facl'";
						$result = mysql_query($sql,$con);
						$row = mysql_fetch_row($result);
	
					//if($_POST['faculty_chooser']!="other" && $_POST['faculty_chooser']!=NULL) 
					//{
						echo "<td>Faculty Name : </td>";
						echo "<td> $row[0] </td>";
					//}
				?>
			</tr>
			<tr>
				<td>Marital Status : </td>
				<td>
					<?php
						echo $row[2];
					?>
				</td>				
			</tr>
			<tr>
				<td>Gender : </td>
				<td>
					<?php
						echo $row[3];
					?>
				</td>				
			</tr>
			
			<tr>
				<td>DOB : <br /> (dd/mm/yyyy)</td>
				<td>
					<?php
						$d=explode('-',$row[4]);
						echo $d[2]."-".$d[1]."-".$d[0];
					?>					 				
				</td>
			</tr>
			<tr>
				<td>Faculty Type : </td>
				<td width="400px">
					<?php
						echo $row[5];
					?>				
				</td>				
			</tr>
			<tr>
				<td>Faculty photo : </td>
				<td>
				<?php
						echo "<img src='$row[6]' class='profile_pic' alt='Photo not available' /><br />";
				?>
				</td>
			</tr>
			<tr>
				<td>Designation : </td>
				<td>
					<?php
						echo $row[7];
					?>
				</td>
			</tr>
			<tr>
				<td>Qualification : </td>
				<td>
				<?php
						echo $row[8];
				?>
				</td>
			</tr>
			<tr>
				<td>Expertise Area:</td>
				<td>
				<?php
						echo $row[9];
				?>
				</td>
			</tr>
			<tr>
				<td>Extra activities:</td>
				<td>
				<?php
						echo $row[10];
				?>
				</td>
			</tr>
			<tr>
				<td>List of Interest:</td>
				<td>
				<?php
						echo $row[11];
				?>
				</td>
			</tr>
			<tr>
				<td>Industry experience : </td>
				<td>
				<?php
						echo $row[12];
				?>
				</td>
			</tr>
			<tr>
				<td>Teaching experience : </td>
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


