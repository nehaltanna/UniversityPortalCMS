<?php
	include("themes/inc_index_1.inc.php");
	if($type!="student")
	{	
		echo "<script>window.location='home.php'</script>";
	}
?>
	<head>
		<script language="javascript" src="calendar/calendar.js"></script>
	</head>
<?php
	require_once('calendar/classes/tc_calendar.php');
	
	$stud=$uname;
	
	if(isset($_POST['btn_setpasswd'])==true)
	{
			$sql = "SELECT student_passwd from students where stud_id='$stud'";
			$result = mysql_query($sql,$con);
			$row = mysql_fetch_row($result);
			$curr=sha1($_POST['txt_currpasswd']);
			$np=$_POST['txt_newpasswd'];
			$shanew=sha1($np);
			$rp=$_POST['txt_repasswd'];
			if($curr!=$row[0]) 
			{
					echo "<script type='text/javascript'>alert('You entered wrong password.')</script>";
			}
			else 
			{
				if($rp==$np) 
				{
					$sql = "UPDATE students SET student_passwd='$shanew' WHERE stud_id='$stud'";
					if (!mysql_query($sql,$con))
					{
  						die('Error: ' . mysql_error());
  					}
  					else 
  					{
  						echo "<script type='text/javascript'>alert('Password changed successfully')</script>";	
  					}
				}
				else 
				{
					echo "<script type='text/javascript'>alert('Sorry password doesnt match.')</script>";	
				}
			}
	}	
	if(isset($_POST['btn_submit'])==true)
	{				
				$sql = "SELECT student_photo from students where stud_id='$stud'";
				$result = mysql_query($sql,$con);
				$row = mysql_fetch_row($result);			
				if($_FILES['fileupload1']['name']!="")
  				{
  					$image="images/students/".$_FILES[fileupload1][name];
  					if($image!=$row[0] && $row[0]!="")
  					{
  							unlink($row[0]);
  					}
				}
				else 
				{
						$image=$row[0];
				}				
				$sql="UPDATE students SET fname='$_POST[txt_fname]',lname='$_POST[txt_lname]',marital_status='$_POST[marital_chooser]',sex='$_POST[gender_chooser]',dob='$_POST[txt_dob]',student_photo='$image',qualification='$_POST[txt_qualification]',expertise='$_POST[txt_expertise]',extra_activities='$_POST[txt_extra]',interest='$_POST[txt_interest]',experience='$_POST[txt_experience]',contact_no='$_POST[txt_contact_no]',residence_no='$_POST[txt_residence_no]',email='$_POST[txt_email]',address='$_POST[txt_address]',city='$_POST[txt_city]',state='$_POST[txt_state]',local_address='$_POST[txt_local_address]' WHERE stud_id='$stud'";			
			if (!mysql_query($sql,$con))
  			{
  				die('Error: ' . mysql_error());
  			}
  					if (($_FILES["fileupload1"]["type"] == "image/gif")
					|| ($_FILES["fileupload1"]["type"] == "image/jpeg")
					|| ($_FILES["fileupload1"]["type"] == "image/pjpeg")
					|| ($_FILES["fileupload1"]["type"] == "image/jpg")
					|| ($_FILES["fileupload1"]["type"] == "image/png"))
					{
  						 if ($_FILES["fileupload1"]["error"] > 0)
    					 {
   			 			 echo "Return Code: " . $_FILES["fileupload1"]["error"] . "<br />";
  			  			 }
   		 			 else
  			  			 {
   		 	 	 			if (file_exists("images/students/" . $_FILES["fileupload1"]["name"]))
  			    	 			{
  			    					echo "file already exist!!";
     			 	 			}
    				 			else
     			 	 			{		
     					 			move_uploaded_file($_FILES["fileupload1"]["tmp_name"],
      							"images/students/" . $_FILES["fileupload1"]["name"]);
      	 		 			}
    			 		 }					
					}			
		}
?>	
<div class="div_middle_right_left">
	<div style="margin:10px;">
		<center>
		<?php
		 	echo "<form name='myform' action='edit_students.php' method='POST' enctype='multipart/form-data'>";
		 ?>
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
				<td>Password : </td>
				<td>
					<table>
					<tr>
						<td>Enter Current Password :</td>
						<td><input type="password" name="txt_currpasswd" /></td>					
					</tr>
					<tr>
						<td>Enter New Password :</td>
						<td><input type="password" name="txt_newpasswd" /></td>					
					</tr>
					<tr>
						<td>Re-Type New Password :</td>
						<td><input type="password" name="txt_repasswd" /></td>					
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td><input type="submit" name="btn_setpasswd" value="Change Password" /></td>					
					</tr>
					</table>
				</td>
			</tr>
			<tr>
				<td>First Name : </td>
				<td>
				<?php
						echo "<input type='text' size='15' name='txt_fname' value='$row[3]' />";
				?>
				</td>
			</tr>
			<tr>
				<td>Last Name : </td>
				<td>
				<?php
						echo "<input type='text' size='15' name='txt_lname' value='$row[4]' />";
				?>
				</td>
			</tr>
			<tr>
				<td>Marital Status : </td>
				<td>
				<select name="marital_chooser">
					<?php
						if($row[5]=="Married")
						{
							echo "<option value='Married' selected='true'>Married</option>";
							echo "<option value='Unmarried'>Unmarried</option>";
						}
						else 
						{
							echo "<option value='Married'>Married</option>";
							echo "<option value='Unmarried' selected='true'>Unmarried</option>";														
						}
					?>
				</select>
				</td>				
			</tr>
			<tr>
				<td>Gender : </td>
				<td>
				<select name="gender_chooser">
					<?php
						if($row[6]=="Male")
						{
							echo "<option value='Male' selected='true'>Male</option>";
							echo "<option value='Female'>Female</option>";
						}
						else 
						{
							echo "<option value='Male'>Male</option>";
							echo "<option value='Female' selected='true'>Female</option>";														
						}
					?>
				</select>
				</td>				
			</tr>
			
			<tr>
				<td>DOB : <br /> (dd/mm/yyyy)</td>
				<td>
					<?php
						$d=explode('-',$row[7]);
						$myCalendar = new tc_calendar("txt_dob", true);
						$myCalendar->setIcon("calendar/images/iconCalendar.gif");
						$myCalendar->setDate($d[2], $d[1], $d[0]);
	  					$myCalendar->setPath("calendar/");
	  					$myCalendar->setYearInterval(1950, 2050);
	  					$myCalendar->writeScript();
					?>					 				
				</td>
			</tr>
			<tr>
				<td>Student photo : </td>
				<td>
				<?php
						echo "<img src='$row[8]' class='profile_pic' alt='Photo not available' /><br />";
						echo "<input type='file' name='fileupload1' />";
				?>
				</td>
			</tr>
			<tr>
				<td>Qualification : </td>
				<td>
				<?php
						echo "<textarea cols='65' rows='5' name='txt_qualification'>$row[9]</textarea>";
				?>
				</td>
			</tr>
			<tr>
				<td>Expertise Area:</td>
				<td>
				<?php
						echo "<textarea cols='65' rows='5' name='txt_expertise'>$row[10]</textarea>";
				?>
				</td>
			</tr>
			<tr>
				<td>Extra activities:</td>
				<td>
				<?php
						echo "<textarea cols='65' rows='5' name='txt_extra'>$row[11]</textarea>";
				?>
				</td>
			</tr>
			<tr>
				<td>List of Interest:<br />(csv)<br />separator (,)</td>
				<td>
				<?php
						echo "<textarea cols='65' rows='5' name='txt_interest'>$row[12]</textarea>";
				?>
				</td>
			</tr>
			<tr>
				<td>Experience : </td>
				<td>
				<?php
						echo "<textarea cols='65' rows='5' name='txt_experience'>$row[13]</textarea>";
				?>
				</td>
			</tr>
			<tr>
				<td>Contact No : </td>
				<td>
				<?php
						echo "<input type='text' size='15' name='txt_contact_no' value='$row[14]' />";
				?>
				</td>
			</tr>
			<tr>
				<td>Residence No : </td>
				<td>
				<?php
						echo "<input type='text' size='15' name='txt_residence_no' value='$row[15]' />";
				?>
				</td>
			</tr>
			<tr>
				<td>Email ID : </td>
				<td>
				<?php
						echo "<input type='text' size='15' name='txt_email' value='$row[16]' />";
				?>
				</td>
			</tr>
			<tr>
				<td>Address : </td>
				<td>
				<?php
						echo "<textarea cols='65' rows='5' name='txt_address'> $row[17] </textarea>";
				?>
				</td>
			</tr>
			<tr>
				<td>City : </td>
				<td>
				<?php
						echo "<input type='text' size='15' name='txt_city' value='$row[18]' />";
				?>
				</td>
			</tr>
			<tr>
				<td>State : </td>
				<td>
				<?php
						echo "<input type='text' size='15' name='txt_state' value='$row[19]' />";
				?>
				</td>
			</tr>
			<tr>
				<td>Local Address : </td>
				<td>
				<?php
						echo "<textarea cols='65' rows='5' name='txt_local_address'>$row[20]</textarea>";
				?>
				</td>
			</tr>
		</table>
		<input type="submit" name="btn_submit" value="save">&nbsp;&nbsp;&nbsp;
		<input type="submit" name="btn_reset_changes" value="reset changes">
		</form>
		</center>
	</div>		
</div>
		
<?php
	mysql_close($con);
	include("themes/inc_index_2.inc.php");
?>


