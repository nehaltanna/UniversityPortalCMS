<?php
	include("themes/inc_index_1.inc.php");
	if($type!="admin"&&$type!="faculty")
	{	
		echo "<script>window.location='home.php'</script>";
	}
	$subj=$_POST['subject_chooser'];	
	
	if(isset($_GET['did'])) 
	{
		unlink("notes/".$_GET[did]);
	}
	if(isset($_POST['upload'])) 
	{
		$file="notes/".$subj."/".$_FILES['fileupload1']['name'];
		if ($_FILES["fileupload1"]["error"] > 0)
	 	{
	 		echo "Return Code: " . $_FILES["fileupload1"]["error"] . "<br />";
	  	}
		else
		{
			if (file_exists($file))
			{
				echo $file;
				echo "file already exist!!";
			}
			else
			{		
				move_uploaded_file($_FILES["fileupload1"]["tmp_name"],$file);
			}
		}	 			 		 					
	}	
?>	
<div class="div_middle_right_left">
	<div style="margin:10px;">
		<center>
		<?php
		 	echo "<form name='myform' action='edit_notes.php' method='POST' enctype='multipart/form-data'>";
		 ?>
		<table border="1" width="625px">
			<tr>
			<td colspan="2">
				<select name="subject_chooser" onChange="document.forms['myform'].submit()">
					<option value='other'>Other</option>
					<?php
						$sql = "SELECT sub_id from subjects";
						$result = mysql_query($sql,$con);						
						while($row = mysql_fetch_row($result)) 
						{						
							foreach($row as &$str)
							{
								if($str==$subj)
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
				<td colspan="2">Upload :
				
					<input type="file" name="fileupload1">&nbsp;&nbsp;<input type="submit" name="upload" value="upload">
				</td>
			</tr>
				<?php
				if($subj!='') 
				{
					$dir="notes/$subj";
					$dd=scandir($dir);
					foreach($dd as $f)
					{
						if($f=="." || $f=="..")
						{
							continue;
						}
						else 
						{
							echo "<tr><td width=350><a href=notes/".$subj."/".$f.">$f</a></td><td><a href=admin_notes.php?did=".$subj."/".$f.">delete</a></td></tr>";
						}
					}
				}
				?>
		</table>
		</form>
		</center>
	</div>		
</div>
		
<?php

	mysql_close($con);
	include("themes/inc_index_2.inc.php");
?>