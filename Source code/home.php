<?php
	include("themes/inc_index_1.inc.php");
?>

<div class="div_middle_right_left">
	<div style="margin:10px;text-align:justify;">
		<marquee scrollamount="620" scrolldelay=2999 behavior="alternate">
			<?php  
        			$dir = "images/home_page/";  
            	if($dd = opendir($dir))
            	{  
                	while (($f = readdir($dd)) !== false)
                	{  
                      echo "<img height=250px width=620px src='images/home_page/$f' />";  
                  }
                	closedir($dd);  
	           	}     
   	   ?>  
		</marquee>
		<h2 align="center" style="color:#990B09;">
			About SICSR
		</h2>
		<?php
			$con=mysql_connect("localhost", "root", "dltanna1") or die(mysql_error());
			mysql_select_db("mysite") or die(mysql_error());
			$sql = "SELECT * from homepage";
			$result = mysql_query($sql,$con);
			$row = mysql_fetch_row($result);
			echo nl2br($row[0]);
		?>
	</div>
</div>

<?php
	include("themes/inc_index_2.inc.php");
?>
