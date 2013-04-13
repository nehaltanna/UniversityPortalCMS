<?php
	include("themes/inc_index_1.inc.php");
	if($type!="admin")
	{	
		echo "<script>window.location='home.php'</script>";
	}
	if(isset($_POST['btn_submit'])==true)
	{				
				$sql = "SELECT address_img from contact_us";
				$result = mysql_query($sql,$con);
				$row = mysql_fetch_row($result);			
				if($_FILES['fileupload1']['name']!="")
  				{
  					$image="images/address_image/".$_FILES[fileupload1][name];
  					if($image!=$row[0] && $row[0]!="")
  					{
  							unlink($row[0]);
  					}
				}
				else 
				{
						$image=$row[0];
				}
			$sql = "DELETE FROM contact_us";		
			if (!mysql_query($sql,$con))
  			{
  				die('Error: ' . mysql_error());
  			}  			
			$sql="INSERT INTO contact_us VALUES('$_POST[txt_address]','$image','$_POST[txt_contactus_at]','$_POST[txt_website]','$_POST[txt_placement]','$_POST[txt_admission]')";
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
   		 	 	 			if (file_exists($image))
  			    	 			{
  			    					echo "file already exist!!";
     			 	 			}
    				 			else
     			 	 			{		
     					 			move_uploaded_file($_FILES["fileupload1"]["tmp_name"],$image);
      	 		 			}
    			 		 }					
					}			
	}
?>	
<div class="div_middle_right_left">
	<div style="margin:10px;">
	
	<script type="text/javascript">
	function newWin()
	{
		window.open("address_image.php",'popUpWindow','height=700,width=800,left=400,top=200,resizable=yes,scrollbars=no,toolbar=no,menubar=no,location=no,directories=no,status=no');	
	}
	</script>
	
		<center>
		<?php
		 	echo "<form name='myform' action='edit_contact_us.php' method='POST' enctype='multipart/form-data'>";
		 ?>
		<table border="1" width="625px">
			<tr>
				<td>Address : </td>
				<td>
				<?php
						$sql = "SELECT address from contact_us";
						$result = mysql_query($sql,$con);
						$row = mysql_fetch_row($result);
						echo "<textarea cols='65' rows='10' name='txt_address'> $row[0] </textarea>";
				?>
				</td>
			</tr>
			<tr>
				<td>Address map image : </td>
				<td>
				<?php
						echo "<input type='file' name='fileupload1' />&nbsp;&nbsp;&nbsp;&nbsp;<a href='JavaScript:newWin();'>See Image</a>";
				?>
				</td>
			</tr>
			<tr>
				<td>Contact us detail : </td>
				<td>
				<?php
						$sql = "SELECT contactus_at from contact_us";
						$result = mysql_query($sql,$con);
						$row = mysql_fetch_row($result);
						echo "<textarea cols='65' rows='10' name='txt_contactus_at'> $row[0] </textarea>";
				?>
				</td>
			</tr>
			<tr>
				<td>Website URL : </td>
				<td>
				<?php
						$sql = "SELECT website from contact_us";
						$result = mysql_query($sql,$con);
						$row = mysql_fetch_row($result);
						echo "<input type='text' size='30' name='txt_website' value='$row[0]' />";
				?>
				</td>
			</tr>
			<tr>
				<td>Placement Department : </td>
				<td>
				<?php
						$sql = "SELECT placement_dept from contact_us";
						$result = mysql_query($sql,$con);
						$row = mysql_fetch_row($result);
						echo "<textarea cols='65' rows='10' name='txt_placement'> $row[0] </textarea>";
				?>
				</td>
			</tr>
			<tr>
				<td>Admission Department : </td>
				<td>
				<?php
						$sql = "SELECT admission_dept from contact_us";
						$result = mysql_query($sql,$con);
						$row = mysql_fetch_row($result);
						echo "<textarea cols='65' rows='10' name='txt_admission'> $row[0] </textarea>";
				?>
				</td>
			</tr>
		</table>
		<input type="submit" name="btn_submit" value="save">&nbsp;&nbsp;&nbsp;
		<input type="submit" name="btn_reset_changes" value="reset changes">&nbsp;&nbsp;&nbsp;
		<input type="button" name="btn_clear" value="Clear All" onclick="this.form.reset();">
		</form>
		</center>
	</div>		
</div>
		
<?php
	mysql_close($con);
	include("themes/inc_index_2.inc.php");
?>


