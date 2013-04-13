<?php
	include("themes/inc_index_1.inc.php");
	
	$prgm=$_GET['pid'];
	$sql = "SELECT * from programmes where prg_id='$prgm'";
	$result = mysql_query($sql,$con);
	$row = mysql_fetch_row($result);
	
	$arr=array('Programme name', 'Objective', 'Specialization', 'Duration', 'Intake', 'Reservation seats', 'Eligibility', 'Selection', 'Medium', 'Programme Structure', 'Fee', 'Internal Assesment', 'External Assesment', 'Practical Assesment', 'Passing Rule', 'Award Of Degree');
?>
<div class="div_middle_right_left">
	<div style="margin:10px;">
			<table border="0" width="620" cellpadding="10" cellspacing="5">
			<?php
				for($i=0;$i<count($arr);$i++)
				{
					echo "<tr><td align=left width='160' style='vertical-align:top'>$arr[$i] :</td><td align=left>";
					if($i==9)
					{
						echo "<a href='$row[9]' target='_blank'>Click Here</a>";
					}
					else 
					{
						echo "$row[$i]";
					}
					echo "</td></tr>";
				}
			?>
			</table>
	</div>		
</div>
<?php
	include("themes/inc_index_2.inc.php");
?>