<?php
	include("themes/inc_index_1.inc.php");
	if($type!="student"&&$type!="admin"&&$type!="faculty")
	{	
		echo "<script>window.location='home.php'</script>";
	}
	
	if(isset($_GET['limit'])) 
	{
		$limit=$_GET['limit'];
	}
	else
	{
		$limit=0;	
	}
	$limit1=$limit+9;
	$receiver=$uname;
	
	$sql="select students.group_id,groups.batch_id,batches.prg_id from students,groups,batches,programmes where students.group_id=groups.group_id and groups.batch_id=batches.batch_id and batches.prg_id=programmes.prg_id and students.stud_id='$receiver'";
	$result = mysql_query($sql,$con);
	$receiver_data = mysql_fetch_row($result);
?>	
<div class="div_middle_right_left">
	<div style="margin:10px;">
	<center>
		<table border='0' width='625px'>		
		<?php
			$sql="select distinct posts.post_id,from_name,post_time,post_text from posts,post_to where posts.post_id=post_to.post_id and (to_name='$receiver' or to_name='$receiver_data[0]' or to_name='$receiver_data[1]' or to_name='$receiver_data[2]') order by posts.post_id desc limit ".$limit.",".$limit1;
			$result = mysql_query($sql,$con);						
			while($row = mysql_fetch_row($result)) 
			{
						echo "<tr style='background-color:#CCCCCC;'>";
						$sql1="select fname,lname,group_id,student_photo from students where stud_id='$row[1]'";
						//$sql1="select faculty_id from faculties where stud_id='$facl'";
						$result1 = mysql_query($sql1,$con);
						$row1=mysql_fetch_row($result1);
						
						if($row1[0]=="") 
						{
							if($row[1]=="admin")
							{
								echo "<td width='520px'>FROM : $row[1] </td>";
								$sql2="select admin_photo from admin";
								$result2 = mysql_query($sql2,$con);
								$row2=mysql_fetch_row($result2);
								echo "<td rowspan=3><img src=$row2[0] height=100px width=100px></td>";
								$sql3="select to_name from post_to where post_id='$row[0]'";
								$result3 = mysql_query($sql3,$con);
								echo "</tr><tr style='background-color:#CCCCCC;'><td>";
								echo "<font style='font-size:12px'>To : &nbsp;&nbsp;";
								while($row3=mysql_fetch_row($result3)) 
								{
										echo "$row3[0] ,";								
								}
								echo "</font></td></tr>";
							}
							else 
							{
								echo "<td width='520px'>FROM : $row[1] </td>";
								$sql2="select faculty_photo from faculties where faculty_id='$row[1]'";
								$result2 = mysql_query($sql2,$con);
								$row2=mysql_fetch_row($result2);
								echo "<td rowspan=3><img src=$row2[0] height=100px width=100px></td>";
								$sql3="select to_name from post_to where post_id='$row[0]'";
								$result3 = mysql_query($sql3,$con);
								echo "</tr><tr style='background-color:#CCCCCC;'><td>";
								echo "<font style='font-size:12px'>To : &nbsp;&nbsp;";
								while($row3=mysql_fetch_row($result3)) 
								{
										echo "$row3[0] ,";								
								}
								echo "</font></td></tr>";
							}
						}
						else
						{
							echo "<td width='520px'>FROM : $row1[0] $row1[1] &nbsp;&nbsp;&nbsp; $row1[2] </td>";
							echo "<td rowspan=3><img src='$row1[3]' height=100px width=100px></td>";
							$sql3="select to_name from post_to where post_id='$row[0]'";
							$result3 = mysql_query($sql3,$con);
							echo "</tr><tr style='background-color:#CCCCCC;'><td>";
							echo "To :<font style='font-size:12px'> &nbsp;&nbsp;";
							while($row3=mysql_fetch_row($result3)) 
							{
									echo "$row3[0] ,";								
							}
							echo "</font></td></tr>";
						}
					$d=explode("-", $row[2]);
					$dd=explode(" ", $d[2]);				
					echo "<tr style='background-color:#CCCCCC;'><td>Post time : $dd[0]-$d[1]-$d[0] $dd[1] </td></tr>";
					echo "<tr><td colspan=2>$row[3]</td></tr>";
			}
		 ?>
	   </table>
	   <?php
	   	$gg=$limit+10;
	   	echo "<h4 align=right><a href='posts.php?limit=$gg'>Show Older&gt;&gt;</a></h4>";
	   ?>
	</center>
	</div>		
</div>

<?php
	mysql_close($con);
	include("themes/inc_index_2.inc.php");
?>