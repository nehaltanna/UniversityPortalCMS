<?php
	include("themes/inc_index_1.inc.php");
	if($type!="admin")
	{	
		echo "<script>window.location='home.php'</script>";
	}
	if($_POST['programme_chooser']=="other")
	{
				$prgm=$_POST['txt_addnew_prg'];
	}
	else 
	{				
				$prgm=$_POST['programme_chooser'];
	}	
	if(isset($_POST['btn_delete'])==true)
	{			
  			$sql = "DELETE FROM programmes where prg_id='$prgm'";
  			if (!mysql_query($sql,$con))
  			{
  				die('Error: ' . mysql_error());
  			}
	}
	if(isset($_POST['btn_submit'])==true)
	{		
			if($_POST['txt_addnew_prg']!=NULL)
			{
				$sql="INSERT INTO programmes VALUES('$prgm','$_POST[txtarea_objective]','$_POST[txtarea_spec]','$_POST[txt_duration]','$_POST[txt_intake]','$_POST[txtarea_resrv]','$_POST[txtarea_eligibility]','$_POST[txtarea_selection]','$_POST[txt_medium]','$_POST[txt_course_link]','$_POST[txtarea_fee]','$_POST[txtarea_internal]','$_POST[txtarea_external]','$_POST[txtarea_practical]','$_POST[txtarea_passing]','$_POST[txtarea_degree]')";
			}		  			
			else
			{
				$sql="UPDATE programmes SET prg_id='$_POST[txt_programme]',objective='$_POST[txtarea_objective]',specialization='$_POST[txtarea_spec]',duration='$_POST[txt_duration]',intake='$_POST[txt_intake]',resrv_seat='$_POST[txtarea_resrv]',eligibility='$_POST[txtarea_eligibility]',selection='$_POST[txtarea_selection]',lang_medium='$_POST[txt_medium]',course_link='$_POST[txt_course_link]',fee='$_POST[txtarea_fee]',internal_assesment='$_POST[txtarea_internal]',external_assesment='$_POST[txtarea_external]',practical_assesment='$_POST[txtarea_practical]',passing_rule='$_POST[txtarea_passing]',award_degree='$_POST[txtarea_degree]' WHERE prg_id='$prgm'";	
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
		 	echo "<form name='myform' action='edit_programmes.php' method='POST'>";
		 	$cnt_spec=0;
		 ?>
			<table border="1" width="620">
			<tr>
			<td colspan="2">
				<select name="programme_chooser" onChange="document.forms['myform'].submit()">
					<option value='other'>Other</option>
					<?php
						$sql = "SELECT prg_id from programmes";
						$result = mysql_query($sql,$con);
						while($row = mysql_fetch_row($result))
						{
							foreach($row as $str)
							{
								if($str==$prgm)
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
				&nbsp;&nbsp;Or type the new one : <input type="text" name="txt_addnew_prg" />
			</td>
			</tr>
			<tr>
				<?php
						$sql = "SELECT * from programmes where prg_id='$prgm'";
						$result = mysql_query($sql,$con);
						$row = mysql_fetch_row($result);
	
					if($_POST['programme_chooser']!="other" && $_POST['programme_chooser']!=NULL) 
					{
						echo "<td>Programme Name : </td>";
						echo "<td><input type='text' name='txt_programme' value='$row[0]' /></td>";
					}
				?>
			</tr>
			<tr>
				<td>
					Objective :
				</td>
				<td>
					<?php
						echo "<textarea name='txtarea_objective' cols='65' rows='5'>$row[1]</textarea>";	
					?>
				</td>
			</tr>
			<tr>
				<td>
					Specialiation:
				</td>
				<td>	
						<?php		
							include_once("fckeditor/fckeditor.php");
							$FCKeditor= new FCKeditor('txtarea_spec');
							$FCKeditor->BasePath = 'fckeditor/';
							$FCKeditor->Value = $row[2];
							$FCKeditor->ToolbarSet = "Basic";
							$FCKeditor->Width='505';
							$FCKeditor->Height='120';
							$FCKeditor->Create();
						?>					
				</td>	
			</tr>
			<tr>
				<td>Duration : </td>
				<td>
					<?php
						echo "<input type='text' name='txt_duration' value='$row[3]' />";
					?>
				</td>			
			</tr>
			<tr>
				<td>Intake : </td>
				<td>
					<?php
						echo "<input type='text' name='txt_intake' value='$row[4]' size='3' />";
					?>
				</td>			
			</tr>
			<tr>
				<td>
					Reservation of seats :
				</td>
				<td>
					<?php
							$FCKeditor= new FCKeditor('txtarea_resrv');
							$FCKeditor->BasePath = 'fckeditor/';
							$FCKeditor->Value = $row[5];
							$FCKeditor->ToolbarSet = "medium";
							$FCKeditor->Width='505';
							$FCKeditor->Height='200';
							$FCKeditor->Create();
					?>
				</td>	
			</tr>
			<tr>
				<td>
					Eligibility criteria :
				</td>
				<td>					
					<?php
						echo "<textarea name='txtarea_eligibility' cols='65' rows='5'>$row[6]</textarea>";
					?>
				</td>	
			</tr>
			<tr>
				<td>
					Selection procedure :
				</td>
				<td>
					<?php
						echo "<textarea name='txtarea_selection' cols='65' rows='5'>$row[7]</textarea>";
					?>
				</td>	
			</tr>
			<tr>
				<td>Medium of instruction : </td>
				<td>
					<?php
						echo "<input type='text' name='txt_medium' value='$row[8]' />";
					?>
				</td>			
			</tr>
			<tr>
				<td>Programme structure : </td>
				<td>
					<?php
						echo "<input type='text' name='txt_course_link' value='$row[9]' />";
					?>
				</td>			
			</tr>
			<tr>
				<td>
					Fee Structure :
				</td>
				<td>			
					<?php
							$FCKeditor= new FCKeditor('txtarea_fee');
							$FCKeditor->BasePath = 'fckeditor/';
							$FCKeditor->Value = $row[10];
							$FCKeditor->ToolbarSet = "medium";
							$FCKeditor->Width='505';
							$FCKeditor->Height='200';
							$FCKeditor->Create();			
					?>
				</td>	
			</tr>
			<tr>
				<td>Assessment : </td>
				<td>
					<?php
						echo "<font style='vertical-align: top;'>Internal&nbsp;&nbsp;&nbsp;&nbsp; :</font> <textarea name='txtarea_internal' cols='52' rows='3'>$row[11]</textarea><br />";
						echo "<font style='vertical-align: top;'>External&nbsp;&nbsp;&nbsp; :</font> <textarea name='txtarea_external' cols='52' rows='3'>$row[12]</textarea><br />";
						echo "<font style='vertical-align: top;'>Practical&nbsp;&nbsp;&nbsp;:</font> <textarea name='txtarea_practical' cols='52' rows='3'>$row[13]</textarea><br />";
					?>
				</td>			
			</tr>
			<tr>
				<td>
					Rule of passing:
				</td>
				<td>
					<?php
						echo "<textarea name='txtarea_passing' cols='65' rows='5'>$row[14]</textarea>";
					?>
				</td>
			</tr>
			<tr>
				<td>
					Award of degree :
				</td>
				<td>
					<?php
						echo "<textarea name='txtarea_degree' cols='65' rows='5'>$row[15]</textarea>";
					?>
				</td>	
			</tr>
		</table>
		<input type="submit" name="btn_submit" value="save">&nbsp;&nbsp;&nbsp;
		<input type="submit" name="btn_reset_changes" value="reset changes">&nbsp;&nbsp;&nbsp;
		<input type="submit" name="btn_delete" value="Delete Programme">			
		</form>
		</center>
	</div>		
</div>
<?php
	mysql_close($con);
	include("themes/inc_index_2.inc.php");
?>


