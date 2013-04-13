<?php
	include("themes/inc_index_1.inc.php");
	
	if($type!="admin")
	{	
		echo "<script>window.location='home.php'</script>";
	}
	if(isset($_POST['btn_set_assgn'])==true)
	{
		$shanew=$_POST['txt_assgn_passwd'];
		$sql = "UPDATE admin SET assignment_passwd='$shanew'";
		if (!mysql_query($sql,$con))
		{
  				die('Error: ' . mysql_error());
  		}
  		echo "<script type='text/javascript'>alert('Password changed successfully')</script>";
	}
	if(isset($_POST['btn_set_res'])==true)
	{
		$shanew=$_POST['txt_res_passwd'];
		$sql = "UPDATE admin SET resource_passwd='$shanew'";
		if (!mysql_query($sql,$con))
		{
  				die('Error: ' . mysql_error());
  		}
  		echo "<script type='text/javascript'>alert('Password changed successfully')</script>";
	}
	if(isset($_POST['btn_set_cpanel'])==true)
	{
		$shanew=$_POST['txt_cpanel_passwd'];
		$sql = "UPDATE admin SET cpanel_passwd='$shanew'";
		if (!mysql_query($sql,$con))
		{
  				die('Error: ' . mysql_error());
  		}
  		echo "<script type='text/javascript'>alert('Password changed successfully')</script>";
	}
	if(isset($_POST['btn_setpasswd'])==true)
	{
			$sql = "SELECT admin_passwd from admin";
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
					$sql = "UPDATE admin SET admin_passwd='$shanew'";
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
?>	
<div class="div_middle_right_left">
	<div style="margin:10px;">	
		<center>
		<?php
		 	echo "<form name='myform' action='edit_admin.php' method='POST' enctype='multipart/form-data'>";
		 ?>
		<table border="1" width="625px">
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
				<td>Assignment Password : </td>
				<td><input type="password" name="txt_assgn_passwd" />&nbsp;&nbsp;<input type="submit" name="btn_set_assgn" value="Change Password" /></td>
			</tr>
			<tr>
				<td>Resource Password : </td>
				<td><input type="password" name="txt_res_passwd" />&nbsp;&nbsp;<input type="submit" name="btn_set_res" value="Change Password" /></td>
			</tr>
			<tr>
				<td>cpanel Password : </td>
				<td><input type="password" name="txt_cpanel_passwd" />&nbsp;&nbsp;<input type="submit" name="btn_set_cpanel" value="Change Password" /></td>
			</tr>
		</table>
		</form>
		</center>
	</div>		
</div>
		
<?php
	mysql_close($con);
	include("themes/inc_index_2.inc.php");
?>


