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
	
	if($_POST['gallery_chooser']=="other")
	{
				$gal=$_POST['txt_addnew_gal'];
	}
	else 
	{
				$gal=$_POST['gallery_chooser'];	
	}
	if(isset($_POST['btn_create'])==true)
	{			
			mkdir("images/photogallery/".$gal,0777);
  			$sql = "INSERT INTO photogallery VALUES('$gal')";
  			if (!mysql_query($sql,$con))
  			{
  				die('Error: ' . mysql_error());
  			}
	}
	if(isset($_POST['btn_deleteselected'])==true)
	{
			$imgs=array("@!@");
			$dir ="images/photogallery/".$gal."/";
         if($dd = opendir($dir))
         {  
         	while (($f = readdir($dd)) != false)
            {  
                if($f=="." || $f=="..")
                {
              		continue;
                }
                array_push($imgs,$f);
            }
         }
			$cnt=$_POST['cnt'];
			for($i=1;$i<=$cnt;$i++)
			{
				if(isset($_POST['img_'.$i]))
				{
					unlink("images/photogallery/".$gal."/".$imgs[$i]);	
				}
			}
	}
	if(isset($_POST['btn_deletegallery'])==true)
	{
		$dir="images/photogallery/".$gal;
		rrmdir($dir);
 		$sql = "DELETE FROM photogallery where gallery_id='$gal'";
		$result = mysql_query($sql,$con);
		$row = mysql_fetch_row($result);			
	}
	if(isset($_POST['btn_upload'])==true)
	{				
      			$image="images/photogallery/".$gal."/".$_FILES["fileupload1"]["name"];
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
	function newWin(tt)
	{
		window.open("see_gallery_image.php?img="+tt,'popUpWindow','height=400,width=500,left=400,top=200,resizable=yes,scrollbars=no,toolbar=no,menubar=no,location=no,directories=no,status=no');	
	}
	</script>
		<center>
		<?php
		 	echo "<form name='myform' action='edit_photogallery.php' method='POST' enctype='multipart/form-data'>";
		 ?>
		<table border="1" width="625px">
			<tr>
			<td colspan="2">
				<select name="gallery_chooser" onChange="document.forms['myform'].submit()">
					<option value="other">Other</option>
					<?php
						$sql = "SELECT gallery_id from photogallery";
						$result = mysql_query($sql,$con);						
						while($row = mysql_fetch_row($result))
						{						
							foreach($row as &$str)
							{
								if($str==$gal)
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
				&nbsp;&nbsp;Or type new :&nbsp;&nbsp;
				<input type="text" name="txt_addnew_gal">
			</td>
			</tr>
			<tr>
				<td>Upload New : </td>
				<td>
					<input type="file" name="fileupload1" />&nbsp;&nbsp;<input type="submit" name="btn_upload" value="upload" />
				</td>				
			</tr>
			<tr>
				<td colspan="2">
					<?php
						$dir ="images/photogallery/".$gal."/";
						$count=1;
						$i=0;  
            		if($dd = opendir($dir))
            		{  
                		while (($f = readdir($dd)) != false)
                		{  
                		    if($f=="." || $f=="..")
                		    {
                		    		continue;
                		    }
                		    $url=$gal."/".$f;
								 if(isset($_POST['btn_selectall']))
								 {
								 	 echo "<input type='checkbox' checked='true' style='vertical-align: top;' name='img_".$count."' />";
   	             			 echo "<a href='JavaScript:newWin(\"$url\");'>";
      	               	 echo "<img height=165px width=165px src=".$dir."/".$f." />";
         	            	 echo "</a>&nbsp;&nbsp;&nbsp;";
            	         	 if(($count % 3)==0) 
               	      	 {
                  	   	 		echo "<br />";
                     		 }  
                     		 $count++;
								 }
								 elseif(isset($_POST['btn_uncheckall']))
								 {
								 	 echo "<input type='checkbox' style='vertical-align: top;' name='img_".$count."' />";
   	             			 echo "<a href='JavaScript:newWin(\"$url\");'>";
      	               	 echo "<img height=165px width=165px src=".$dir."/".$f." />";
         	            	 echo "</a>&nbsp;&nbsp;&nbsp;";
            	         	 if(($count % 3)==0) 
               	      	 {
                  	   	 		echo "<br />";
                     		 }  
                     		 $count++;
								 } 
								 else if(isset($_POST['btn_inverse']))
								 {								
								 		$i++;
										if(isset($_POST['img_'.$i])) 
										{
											echo "<input type='checkbox' style='vertical-align: top;' name='img_".$count."' />";
   	             					echo "<a href='JavaScript:newWin(\"$url\");'>";
      	               			echo "<img height=165px width=165px src=".$dir."/".$f." />";
         	            	 		echo "</a>&nbsp;&nbsp;&nbsp;";		
										}
										else 
										{
								 			echo "<input type='checkbox' checked='true' style='vertical-align: top;' name='img_".$count."' />";
   	             					echo "<a href='JavaScript:newWin(\"$url\");'>";
      	               			echo "<img height=165px width=165px src=".$dir."/".$f." />";
         	            	 		echo "</a>&nbsp;&nbsp;&nbsp;";
                     	 		}
                     	 		if(($count % 3)==0) 
                     	 		{
                     	 			echo "<br />";
                     	 		}  
                     	 		$count++;
								 }
								 else 
								 {								
	                			 echo "<input type='checkbox' style='vertical-align: top;' name='img_".$count."' />";
   	             			 echo "<a href='JavaScript:newWin(\"$url\");'>";
      	               	 echo "<img height=165px width=165px src=".$dir."/".$f." />";
         	            	 echo "</a>&nbsp;&nbsp;&nbsp;";
            	         	 if(($count % 3)==0) 
               	      	 {
                  	   	 		echo "<br />";
                     		 }  
                     		 $count++;
                 			 }
                 			 echo "<input type='hidden' name='cnt' value=".($count-1)." />";                		 
	           		}
	           		closedir($dd); 
	           	}
					?>
				</td>
			</tr>
		</table>
		
		<input type="submit" name="btn_selectall" value="Select all">&nbsp;&nbsp;&nbsp;
		<input type="submit" name="btn_uncheckall" value="Uncheck all">&nbsp;&nbsp;&nbsp;
		<input type="submit" name="btn_deleteselected" value="Delete Selected">&nbsp;&nbsp;&nbsp;
		<input type="submit" name="btn_inverse" value="Inverse selection"><br />
		<input type="submit" name="btn_create" value="Create gallery">&nbsp;&nbsp;&nbsp;
		<input type="submit" name="btn_deletegallery" value="Delete gallery">
		</form>
		</center>
	</div>		
</div>
		
<?php
	mysql_close($con);
	include("themes/inc_index_2.inc.php");
?>