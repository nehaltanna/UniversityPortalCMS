<?php
	include("themes/inc_index_1.inc.php");
	if($type!="admin")
	{	
		echo "<script>window.location='home.php'</script>";
	}
	function rrmdir($dir)
	{
   		if (is_dir($dir)) 
   		{
     			$objects = scandir($dir);
     			foreach ($objects as $object) 
     			{
       			if ($object != "." && $object != "..") 
       			{
         			if (filetype($dir."/".$object) == "dir")
         			 	rrmdir($dir."/".$object);
         			else 
         				unlink($dir."/".$object);
       			}
     			}
    		 reset($objects);
     		 rmdir($dir);
   		}
 	}
	
	if($_POST['subject_chooser']=="other")
	{
				$subj=$_POST['txt_addnew_sub'];
	}
	else 
	{
				$subj=$_POST['subject_chooser'];	
	}
	if(isset($_POST['btn_delete'])==true)
	{			
  			$sql = "DELETE FROM subjects where sub_id='$subj'";
  			if (!mysql_query($sql,$con))
  			{
  				die('Error: ' . mysql_error());
  			}
  			rrmdir("notes/$subj");
	}
	if(isset($_POST['btn_submit'])==true)
	{				
			if($_POST['txt_addnew_sub']!=NULL)
			{
				$sql="INSERT INTO subjects VALUES('$subj','$_POST[txt_sem_no]','$_POST[type_chooser]','$_POST[txt_credits]','$_POST[txt_marks]','$_POST[txt_internal_marks]','$_POST[txt_external_marks]','$_POST[txt_internal_evo]','$_POST[txt_external_evo]','$_POST[txt_topic_list]','$_POST[txt_reference_books]')";
				mkdir("notes/$subj",0777);	
			}
			else
			{
				$sql="UPDATE subjects SET sub_id='$_POST[txt_subject]',sem_no='$_POST[txt_sem_no]',sub_type='$_POST[type_chooser]',no_credits='$_POST[txt_credits]',marks='$_POST[txt_marks]',internal_marks='$_POST[txt_internal_marks]',external_marks='$_POST[txt_external_marks]',internal_evolution='$_POST[txt_internal_evo]',external_evolution='$_POST[txt_external_evo]',topic_list='$_POST[txt_topic_list]',reference_books='$_POST[txt_reference_books]' WHERE sub_id='$subj'";
			}			
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
		 	echo "<form name='myform' action='edit_courses.php' method='POST'>";
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
				&nbsp;&nbsp;Or type the new one : <input id="f1" type="text" name="txt_addnew_sub" />
			</td>
			</tr>
			<tr>
				<?php
						$sql = "SELECT * from subjects where sub_id='$subj'";
						$result = mysql_query($sql,$con);
						$row = mysql_fetch_row($result);
	
					if($_POST['subject_chooser']!="other" && $_POST['subject_chooser']!=NULL) 
					{
						echo "<td>Subject Name : </td>";
						echo "<td><input type='text' name='txt_subject' value='$row[0]' /></td>";
					}
				?>
			</tr>
			<tr>
				<td>Semester No : </td>
				<td>
				<?php
						echo "<input type='text' name='txt_sem_no' value='$row[1]' size='3' />";
				?>
				</td>
			</tr>
			<tr>
				<td>Subject Type : </td>
				<td>
				<select name="type_chooser">
				<?php
						if($row[2]=="main")
						{
							echo "<option value='main' selected='true'>Main</option>";
							echo "<option value='elective'>Elective</option>";
						}
						else 
						{
							echo "<option value='main'>Main</option>";
							echo "<option value='elective' selected='true'>Elective</option>";														
						}
				?>
				</select>
				</td>
			</tr>
			<tr>
				<td>No of Credits : </td>
				<td>
					<input type="text" size="5" name="txt_credits" value=<?php echo $row[3]; ?> >
				</td>
			</tr>
			<tr>
				<td>Total Marks : </td>
				<td>
					<input type="text" size="5" name="txt_marks" value=<?php echo $row[4]; ?> >
				</td>
			</tr>
			<tr>
				<td>Internal Marks : </td>
				<td>
					<input type="text" size="5" name="txt_internal_marks" value=<?php echo $row[5]; ?> >
				</td>
			</tr>
			<tr>
				<td>External Marks : </td>
				<td>
					<input type="text" size="5" name="txt_external_marks" value=<?php echo $row[6]; ?> >
				</td>
			</tr>
			<tr>
				<td>Internal Evolution : </td>
				<td>
					<?php
							include_once("fckeditor/fckeditor.php");
							$FCKeditor= new FCKeditor('txt_internal_evo');
							$FCKeditor->BasePath = 'fckeditor/';
							$FCKeditor->Value = $row[7];
							$FCKeditor->ToolbarSet = "Basic";
							$FCKeditor->Width='430';
							$FCKeditor->Height='300';
							$FCKeditor->Create();
					?>
				</td>
			</tr>
			<tr>
				<td>External Evolution : </td>
				<td>
					<?php
							include_once("fckeditor/fckeditor.php");
							$FCKeditor= new FCKeditor('txt_external_evo');
							$FCKeditor->BasePath = 'fckeditor/';
							$FCKeditor->Value = $row[8];
							$FCKeditor->ToolbarSet = "Basic";
							$FCKeditor->Width='430';
							$FCKeditor->Height='300';
							$FCKeditor->Create();
					?>
				</td>
			</tr>
			<tr>
				<td>Topic List : </td>
				<td>
					<?php
							include_once("fckeditor/fckeditor.php");
							$FCKeditor= new FCKeditor('txt_topic_list');
							$FCKeditor->BasePath = 'fckeditor/';
							$FCKeditor->Value = $row[9];
							$FCKeditor->ToolbarSet = "Basic";
							$FCKeditor->Width='430';
							$FCKeditor->Height='300';
							$FCKeditor->Create();
					?>
				</td>
			</tr>
			<tr>
				<td>Reference_books : </td>
				<td>
					<?php
							include_once("fckeditor/fckeditor.php");
							$FCKeditor= new FCKeditor('txt_reference_books');
							$FCKeditor->BasePath = 'fckeditor/';
							$FCKeditor->Value = $row[10];
							$FCKeditor->ToolbarSet = "Basic";
							$FCKeditor->Width='430';
							$FCKeditor->Height='300';
							$FCKeditor->Create();
					?>
				</td>
			</tr>
		</table>
		<input type="submit" name="btn_submit" value="save">&nbsp;&nbsp;&nbsp;
		<input type="submit" name="btn_reset_changes" value="reset changes">&nbsp;&nbsp;&nbsp;
		<input type="submit" name="btn_delete" value="Delete Subject">
		</form>
		</center>
	</div>		
</div>
		
<?php

	mysql_close($con);
	include("themes/inc_index_2.inc.php");
?>