<?php
	include("themes/inc_index_1.inc.php");
?>	
<div class="div_middle_right_left">
	<div style="margin:10px;">
	
		<center>
		<table border="0" width="625px">
			<tr>
				<td colspan="2"><h2 align="center" style="color:#990B09;"><u>List Of Recruiters</u></h2></td>		
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
                		    
      	              	 echo "<img height=165px width=165px src=".$dir."/".$f." style='vertical-align:top;margin:10px;padding:10px;' />";
            	          if(($count % 3)==0) 
               	       {
                  	   		echo "<br />";
                     	 }  
                     	 $count++;
                 			 echo "<input type='hidden' name='cnt' value=".($count-1)." />";                		 
	           		}
	           		closedir($dd); 
	           	}
					?>
				</td>
			</tr>
		</table>
		</center>
	</div>		
</div>
		
<?php
	mysql_close($con);
	include("themes/inc_index_2.inc.php");
?>