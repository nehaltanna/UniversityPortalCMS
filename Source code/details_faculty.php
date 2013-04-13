<html>
<body>
<center>
<table border="0" cellpadding="3px">
<?php

	$con=mysql_connect("localhost", "root", "dltanna1") or die(mysql_error());
	mysql_select_db("mysite") or die(mysql_error());
	
	$faculty=$_GET['fid'];
	$sql = "SELECT faculty_id, designation, qualification, expertise, extra_activities, interest, industry_exp, teaching_exp from faculties where faculty_id='$faculty'";
	$result = mysql_query($sql,$con);
	$fields=array("Faculty Name : ","Designation : ","Qualification : ","Expertise : ","Extra Activities : ","Area of interest : ","Industry Experience : ","Teaching Experience : ");
	$count=0;
	$row = mysql_fetch_row($result);
	foreach($row as $str)
	{
			echo "<tr>";
			echo "<td>$fields[$count]&nbsp;&nbsp;</td><td>$str</td>";
			echo "</tr>";
			$count++;
	}	
?>
</table>
</center>
</body>
</html>