<?php
	include("themes/inc_index_1.inc.php");
	if($type!="admin")
	{	
		echo "<script>window.location='home.php'</script>";
	}
	if(isset($_POST['btn_deleteselected'])==true)
	{
			$imgs=array("@!@");
			$dir ="images/recruiters/";
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
					unlink("images/recruiters/".$imgs[$i]);	
				}
			}
	}
	if(isset($_POST['btn_upload'])==true)
	{				
      			$image="images/recruiters/".$_FILES["fileupload1"]["name"];
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
	
		<center>
		<?php
		 	echo "<form name='myform' action='edit_recruiters.php' method='POST' enctype='multipart/form-data'>";
		 ?>
		<table border="1" width="625px">
			<tr>
				<td>Upload New : </td>
				<td>
					<input type="file" name="fileupload1" />&nbsp;&nbsp;<input type="submit" name="btn_upload" value="upload" />
				</td>				
			</tr>
			<tr>
				<td colspan="2">
					<?php
						$dir ="images/recruiters/";
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
                		    $url=$f;
								 if(isset($_POST['btn_selectall']))
								 {
								 	 echo "<input type='checkbox' checked='true' style='vertical-align: top;' name='img_".$count."' />";
      	               	 echo "<img height=155px width=155px src=".$dir."/".$f." style='vertical-align:top;margin:5px;padding:5px;' />";
            	         	 if(($count % 3)==0) 
               	      	 {
                  	   	 		echo "<br />";
                     		 }  
                     		 $count++;
								 }
								 elseif(isset($_POST['btn_uncheckall']))
								 {
								 	 echo "<input type='checkbox' style='vertical-align: top;' name='img_".$count."' />";
      	               	 echo "<img height=155px width=155px src=".$dir."/".$f." style='vertical-align:top;margin:5px;padding:5px;' />";
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
      	               			echo "<img height=155px width=155px src=".$dir."/".$f." style='vertical-align:top;margin:5px;padding:5px;' />";
										}
										else 
										{
								 			echo "<input type='checkbox' checked='true' style='vertical-align: top;' name='img_".$count."' />";
      	               			echo "<img height=155px width=155px src=".$dir."/".$f." style='vertical-align:top;margin:5px;padding:5px;' />";
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
      	               	 echo "<img height=155px width=155px src=".$dir."/".$f." style='vertical-align:top;margin:5px;padding:5px;' />";
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
		</form>
		</center>
	</div>		
</div>
		
<?php
	mysql_close($con);
	include("themes/inc_index_2.inc.php");
?>