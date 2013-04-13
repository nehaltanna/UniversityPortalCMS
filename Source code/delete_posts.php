<?php
	include("themes/inc_index_1.inc.php");
	if($type!="student"&&$type!="faculty"&&$type!="admin")
	{	
		echo "<script>window.location='home.php'</script>";
	}
	if(isset($_GET['did']))
	{
		$sql="delete from posts where post_id='$_GET[did]'";
		if (!mysql_query($sql,$con))
	  	{
  			die('Error: ' . mysql_error());
		}	
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
	$name=$uname;
?>	
<div class="div_middle_right_left">
	<div style="margin:10px;">
	<center>
		<?php
		 	echo "<form name='myform' action='delete_posts.php' method='POST' enctype='multipart/form-data'>";
		?>
		<table border='0' width='625px'>		
		<?php
			$sql="select distinct posts.post_id,post_time,post_text from posts,post_to where posts.post_id=post_to.post_id and from_name='$name' order by posts.post_id desc limit ".$limit.",".$limit1;
			$result = mysql_query($sql,$con);						
			while($row = mysql_fetch_row($result)) 
			{
				$sql3="select to_name from post_to where post_id='$row[0]'";
				$result3 = mysql_query($sql3,$con);
				echo "<tr style='background-color:#CCCCCC;'><td colspan=2>";
				echo "To :<font style='font-size:12px'> &nbsp;&nbsp;";
				while($row3=mysql_fetch_row($result3)) 
				{
					echo "$row3[0] ,";								
				}
				echo "</font></td></tr>";
				$d=explode("-", $row[1]);
				$dd=explode(" ", $d[2]);				
				echo "<tr style='background-color:#CCCCCC;'><td width=560px>Post time : $dd[0]-$d[1]-$d[0] $dd[1] </td><td><a href='delete_posts.php?did=$row[0]'>delete</a></td></tr>";
				echo "<tr><td colspan=2>$row[2]</td></tr>";
			}
		 ?>
	   </table>
	   <?php
	   	$gg=$limit+10;
	   	echo "<h4 align=right><a href='delete_posts.php?limit=$gg'>Show Older&gt;&gt;</a></h4>";
	   	echo "</form>";
	   ?>
	</center>
	</div>		
</div>

<?php
	mysql_close($con);
	include("themes/inc_index_2.inc.php");
?>