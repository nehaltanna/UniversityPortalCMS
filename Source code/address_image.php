<html>
<body>
<center>
<?php
	$con=mysql_connect("localhost", "root", "dltanna1") or die(mysql_error());
	mysql_select_db("mysite") or die(mysql_error());
	$sql = "SELECT address_img from contact_us";
	$result = mysql_query($sql,$con);
	$row = mysql_fetch_row($result);
	$img=$row[0];
	
	echo "<img src='$img' height='600' width='900' alt='image not available'/>";
?>
</center>
</body>
</html>