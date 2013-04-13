<?php
	include("themes/inc_index_1.inc.php");
	if($type!="student"&&$type!="faculty"&&$type!="admin")
	{	
		echo "<script>window.location='home.php'</script>";
	}
	if(isset($_POST['btn_send'])==true) 
	{
		if($_POST['prn_list']!="") 
		{
			$students=explode(",",$_POST['prn_list']);
		}
		$faculties=$_POST['faculty_list'];
		$groups=$_POST['group_list'];
		$batches=$_POST['batch_list'];
		$programmes=$_POST['programme_list'];	
		
		$time=date("Y-m-d H:i:s");
		$text=$_POST['post_text'];

		$sql = "insert into posts(from_name,post_time,post_text) values('$uname','$time','$text')";
		if (!mysql_query($sql,$con))
  		{
  					die('Error: ' . mysql_error());
  		}
  		$sql = "select post_id from posts where post_time='$time' and from_name='$uname'";
  		$result = mysql_query($sql,$con);						
		$row = mysql_fetch_row($result);
		
		foreach($students as $str)
		{
			$sql="insert into post_to(post_id,to_name) values('$row[0]','$str')";
			if (!mysql_query($sql,$con))
	  		{
  					die('Error: ' . mysql_error());
  			}
		}
		foreach($faculties as $str)
		{
			$sql="insert into post_to(post_id,to_name) values('$row[0]','$str')";
			if (!mysql_query($sql,$con))
	  		{
  					die('Error: ' . mysql_error());
  			}
		}
		foreach($groups as $str)
		{
			$sql="insert into post_to(post_id,to_name) values('$row[0]','$str')";
			if (!mysql_query($sql,$con))
	  		{
  					die('Error: ' . mysql_error());
  			}
		}
		foreach($batches as $str)
		{
			$sql="insert into post_to(post_id,to_name) values('$row[0]','$str')";
			if (!mysql_query($sql,$con))
	  		{
  					die('Error: ' . mysql_error());
  			}
		}
		foreach($programmes as $str)
		{
			$sql="insert into post_to(post_id,to_name) values('$row[0]','$str')";
			if (!mysql_query($sql,$con))
	  		{
  					die('Error: ' . mysql_error());
  			}
		}
		if($_POST['admin']!=NULL)
		{
			$sql="insert into post_to(post_id,to_name) values('$row[0]','admin')";
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
		 	echo "<form name='myform' action='send_post.php' method='POST' enctype='multipart/form-data'>";
		 ?>
		<tr>
			<td align="center">
				<b>PRN :</b><br />
				(List of prn Separated by comma)
			</td>
			<td>
				<input type="text" name="prn_list" size="50">
			</td>
		</tr>
		<tr>
			<td align="center">
				<b>Faculty :</b><br />
				(Hold ctrl key to select multiple)
			</td>
			<td>
				<select name="faculty_list[]" size="3" multiple="multiple">
					
					<?php
						$sql = "SELECT faculty_id from faculties";
						$result = mysql_query($sql,$con);						
						while($row = mysql_fetch_row($result)) 
						{						 
							foreach($row as &$str)
							{
								echo "<option value='$str'>$str</option>";	
							}
						}
					?>
				</select>
			</td>
		</tr>
		<tr>
			<td align="center">
				<b>Group :</b><br />
				(Hold ctrl key to select multiple)
			</td>
			<td>
				<select name="group_list[]" size="3" multiple="multiple">
					
					<?php
						$sql = "SELECT group_id from groups";
						$result = mysql_query($sql,$con);						
						while($row = mysql_fetch_row($result)) 
						{						 
							foreach($row as &$str)
							{
								echo "<option value='$str'>$str</option>";	
							}
						}
					?>
				</select>
			</td>
		</tr>
		<tr>
			<td align="center">
				<b>Batch :</b><br />
				(Hold ctrl key to select multiple)
			</td>
			<td>
				<select name="batch_list[]" size="3" multiple="multiple">
					
					<?php
						$sql = "SELECT batch_id from batches";
						$result = mysql_query($sql,$con);						
						while($row = mysql_fetch_row($result)) 
						{						 
							foreach($row as &$str)
							{
								echo "<option value='$str'>$str</option>";	
							}
						}
					?>
				</select>
			</td>
		</tr>
		<tr>
			<td align="center">
				<b>Programme :</b><br />
				(Hold ctrl key to select multiple)
			</td>
			<td>
				<select name="programme_list[]" size="3" multiple="multiple">
					
					<?php
						$sql = "SELECT prg_id from programmes";
						$result = mysql_query($sql,$con);						
						while($row = mysql_fetch_row($result)) 
						{						 
							foreach($row as &$str)
							{
								echo "<option value='$str'>$str</option>";	
							}
						}
					?>
				</select>
			</td>
		</tr>
		<tr>
			<td align="center">
				<b>Admin :</b>
			</td>
			<td>
				<select name="admin" size="3" multiple="multiple">
					<option value="admin">Admin</option>					
				</select>
			</td>
		</tr>
		<tr>
			<td colspan="2">
				<?php
					include_once("fckeditor/fckeditor.php");
					$FCKeditor= new FCKeditor('post_text');
					$FCKeditor->BasePath = 'fckeditor/';
					$FCKeditor->ToolbarSet = "basicplus";
					$FCKeditor->Width='620';
					$FCKeditor->Height='400';
					$FCKeditor->Create();
				?>
			</td>
		</tr>
		</table>
		
		<input type="submit" name="btn_send" value="Send">&nbsp;&nbsp;&nbsp;
		<input type="button" name="btn_clear" value="Clear All" onclick="this.form.reset();">
		
		</form>
	</center>
	</div>		
</div>

<?php
	mysql_close($con);
	include("themes/inc_index_2.inc.php");
?>