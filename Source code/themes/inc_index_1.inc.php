<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php 
	$con=mysql_connect("localhost", "root", "dltanna1") or die(mysql_error());
	mysql_select_db("mysite") or die(mysql_error());
	
	$flag=0;
	if(isset($_POST['login']))
	{
		$pass=sha1($_POST['passwd']);
		if(preg_match("/[0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9]/",$_POST['uname'])) 
		{
			$sql="select count(*) from students where stud_id='$_POST[uname]' and student_passwd='$pass'";
			$result=mysql_query($sql,$con);
			$row=mysql_fetch_row($result);
			
			if($row[0]==1)
			{
				session_start();
				$_SESSION['username']=$_POST['uname'];
				$_SESSION['type']="student";
				header('Location: time_table.php');			
			}
			else 
			{
				$flag=1;
			}		
		}
		else if($_POST['uname']=="admin")
		{
			$sql="select count(*) from admin where admin_passwd='$pass'";
			$result=mysql_query($sql,$con);
			$row=mysql_fetch_row($result);
			if($row[0]==1)
			{
				session_start();
				$_SESSION['username']="admin";
				$_SESSION['type']="admin";
				header('Location: posts.php');			
			}
			else 
			{
				$flag=1;
			}
		}
		else if($_POST['uname']==NULL)
		{
			$flag=1;
		}
		else
		{
			$sql="select count(*) from faculties where faculty_id='$_POST[uname]' and faculty_passwd='$pass'";
			$result=mysql_query($sql,$con);
			$row=mysql_fetch_row($result);
			if($row[0]==1)
			{
				session_start();
				$_SESSION['username']=$_POST['uname'];
				$_SESSION['type']="faculty";
				header('Location: faculty_time_table.php');			
			}
			else 
			{
				$flag=1;
			}
		}
	}
		session_start();
		if(isset($_SESSION['username']))
		{
			$uname=$_SESSION['username'];
			$type=$_SESSION['type'];
		}
		else 
		{
			$uname="Guest";
			$type="guest";
		}		
	if($_GET['logout']=="yes") 
	{
		session_unset();
		$uname="Guest";
		$type="guest";
	}
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="stylesheet" href="styles/layout.css" type="text/css" />
<title>Welcome To SICSR Portal</title>
<script type="text/javascript" >
var timeout	= 500;
var closetimer	= 0;
var ddmenuitem	= 0;

// open hidden layer
function mopen(id)
{	
	// cancel close timer
	mcancelclosetime();
//document.getElementById('lnk').style.background-color="blue";
	// close old layer
	if(ddmenuitem) ddmenuitem.style.visibility = 'hidden';

	// get new layer and show it
	ddmenuitem = document.getElementById(id);
	ddmenuitem.style.visibility = 'visible';

}
// close showed layer
function mclose()
{
	if(ddmenuitem) ddmenuitem.style.visibility = 'hidden';
}

// go close timer
function mclosetime()
{
	closetimer = window.setTimeout(mclose, timeout);
}

// cancel close timer
function mcancelclosetime()
{
	if(closetimer)
	{
		window.clearTimeout(closetimer);
		closetimer = null;
	}
}

// close layer when click-out
document.onclick = mclose; 
</script>

	 <link rel="stylesheet" type="text/css" href="JSCal2/css/jscal2.css" />
    <link rel="stylesheet" type="text/css" href="JSCal2/css/border-radius.css" />
    <link rel="stylesheet" type="text/css" href="JSCal2/css/steel/steel.css" />
    <script type="text/javascript" src="JSCal2/js/jscal2.js"></script>
    <script type="text/javascript" src="JSCal2/js/lang/en.js"></script>
    
</head>
<body background="images/background-001.jpg">
<div class="div_main">

	<div class="div_header">
	
		<div class="div_header_top">
		<?php
			if($flag==1)
			{
				echo "<script> alert('Wrong user name or password');</script>";
			} 
		 	echo "<strong class='font_strong'>Welcome <a href=# class='link_regular'> $uname </a>&nbsp;(&nbsp;";
		 
		 	if($uname=="Guest")
		 	{
		 		echo "<a href='home.php' class='link_regular'>Login</a>";	
		 	}
		 	else 
		 	{
		 		echo "<a href='home.php?logout=yes' class='link_regular'>Logout</a>";
		 	}
		
			echo "&nbsp;)&nbsp;</strong>"; 
		 ?>
		</div>
		
		<div class="div_header_middle">
			<img src="images/sicsr-head.jpg" class="img_header"/>
		</div>
		
		<div class="div_header_bottom">
		  <form action="home.php" method="post" id="sitesearch">	
          	<strong class="font_strong">Search&nbsp;&nbsp;</strong>
          	<input type="text" value="Search In Website" size="30" />
          	<input name="image" type="image" class="search_button" id="search" src="images/magnifying_glass.png" alt="Search" />
          	&nbsp;&nbsp; &nbsp; 
	      </form>
		</div>
	</div>
	
	<div class="div_menu">
		<table class="menu_table">
		<tr id="sddm">
		<td><a class="link_menu" href="home.php">Home</a></td>
		<td id="lnk"><a class="link_menu" href="#" onmouseover="mopen('m1')" onmouseout="mclosetime()">Programmes</a>
		<div id="m1" onmouseover="mcancelclosetime()" onmouseout="mclosetime()">
		<?php
				$sql="select prg_id from programmes";
				$result=mysql_query($sql,$con);
				while($row=mysql_fetch_row($result))
				{
					echo "<a style='text-align:center;text-decoration:none;font-size:18px;color:#000000;' href=programmes.php?pid=".$row[0].">".$row[0]."</a>";
				}
		?>
		</div>
		</td> 
		<td><a class="link_menu" href="faculties.php">Faculty</a></td>
		<td id="lnk"><a class="link_menu" href="#" onmouseover="mopen('m2')" onmouseout="mclosetime()">PhotoGallery</a>
		<div id="m2" onmouseover="mcancelclosetime()" onmouseout="mclosetime()">
		<?php
				$sql="select gallery_id from photogallery";
				$result=mysql_query($sql,$con);
				while($row=mysql_fetch_row($result))
				{
					echo "<a style='text-align:center;text-decoration:none;font-size:18px;color:#000000;' href=photogallery.php?gid=".$row[0].">$row[0]</a>";
				}
		?>
		</td>
		<td id="lnk"><a class="link_menu" href="#" onmouseover="mopen('m3')" onmouseout="mclosetime()">Placement</a>
		<div id="m3" onmouseover="mcancelclosetime()" onmouseout="mclosetime()">
			<a style='text-align:center;text-decoration:none;font-size:18px;color:#000000;' href="placementcell.php">Placement Cell</a>
			<a style='text-align:center;text-decoration:none;font-size:18px;color:#000000;' href="placementstats.php">Placement Statistic</a>
		</div>
		</td>
		<td id="lnk"><a class="link_menu" href="#" onmouseover="mopen('m4')" onmouseout="mclosetime()">Events</a>
		<div id="m4" onmouseover="mcancelclosetime()" onmouseout="mclosetime()">
		<?php
				$sql="select event_id from events";
				$result=mysql_query($sql,$con);
				while($row=mysql_fetch_row($result))
				{
					echo "<a style='text-align:center;text-decoration:none;font-size:18px;color:#000000;' href=events.php?eid=".$row[0].">$row[0]</a>";
				}
		?>
		</div>
		</td>
		<td><a class="link_menu" href="contact_us.php">ContactUS</a></td>						
		</tr>
		<div style="clear:both"></div>
		</table>
	</div>
	
	<div class="div_middle">
		<?php
		if($type=="guest")
		{
		?>
		<div class="div_middle_left">
		<table class="menu_left">
		<tr class="menu_left_row"><td><a href="http://mail.sicsr.ac.in" class="link_menu_left">Web mail</a></td></tr>
		<tr class="menu_left_row"><td><hr class="line_left_menu" /></td></tr>
		<tr class="menu_left_row"><td><a href="http://wiki.sdrclabs.in" class="link_menu_left">SICSR Wiki</a></td></tr>
		<tr class="menu_left_row"><td><hr class="line_left_menu" /></td></tr>
		<tr class="menu_left_row"><td><a href="http://elearning.sdrclabs.in" class="link_menu_left">Moodle</a></td></tr>
		<tr class="menu_left_row"><td><hr class="line_left_menu" /></td></tr>
		<tr class="menu_left_row"><td><a href="http://10.10.21.35" class="link_menu_left">Saggitarious</a></td></tr>
		<tr class="menu_left_row"><td><hr class="line_left_menu" /></td></tr>
		<tr class="menu_left_row"><td><a href="http://10.10.22.30/moon/apache/" class="link_menu_left">Oracle Express</a></td></tr>
		<tr class="menu_left_row"><td><hr class="line_left_menu" /></td></tr>
		<tr class="menu_left_row"><td><a href="directors_desk.php" class="link_menu_left">Director's Desk</a></td></tr>
		<tr class="menu_left_row"><td><hr class="line_left_menu" /></td></tr>

		<tr><td><a href="recruiters.php" style="text-decoration:none;"><h3 class="title">Our Recruiters</h3></a></td></tr>
		<tr class="menu_left_row">
			<td>
			<marquee direction="up">
			<?php
				$dir="images/recruiters";
				if (is_dir($dir)) 
	   		{
	   			$dd=scandir($dir);
					foreach($dd as $f) 
	     			{
	       			if($f=="." || $f=="..")
	       			{
	       				continue;
	       			}
	       			else 
	       			{
	       				echo "<img class='img_recruiters' src=".$dir."/".$f."><br><br>";
	       			}
	     			}
	     		}
	     	?>
			</marquee>
		  </td>
		</tr>
		</table>
		</div>
		<?php
		}
		else if($type=="student")
		{
		?>
		<div class="div_middle_left">
		<table class="menu_left">
			<?php
				$sql="select fname,lname,student_photo from students where stud_id='$uname'";
				$result=mysql_query($sql,$con);
				$row=mysql_fetch_row($result);
			?>
			<tr class="menu_left_row_students"><td>
			<?php
				echo "<img src=".$row[2]." class='profile_pic' alt='Photo not available' />";
			?>
			</td></tr>
			<tr class="menu_left_row_students">
					  <td class="profile_text">Name:<strong> <?php echo "$row[0] $row[1]"; ?> </strong></td>
			</tr>
			<tr class="menu_left_row_students">
					<td class="profile_text">PRN :<strong> <?php echo "$uname"; ?> </strong></td>
			</tr>
			<tr class="menu_left_row_students">
				<td class="link_profile_edit"><a href="edit_students.php" class="link_edit">edit</a>&nbsp;&nbsp;</td>
			</tr>
			<tr class="menu_left_row_students">
			<?php
				$p=0;
				$t=0;
				$sql="select distinct start_date,end_date from attendance where stud_id='$uname'";
				$result = mysql_query($sql,$con);
				while($row = mysql_fetch_row($result)) 
				{
					$sql1="select sub_id,total_lectures,no_absent from attendance where stud_id='$uname' and start_date='$row[0]' and end_date='$row[1]'";
					$result1 = mysql_query($sql1,$con);					 
					while($row1 = mysql_fetch_row($result1))
					{
							$t=$t+$row1[1];
							$p=$p+($row1[1]-$row1[2]);
					}
			  }
			  $val=($p*100)/$t;
			  $att=round($val,2);
			?>
				<td class="profile_text"><a href="attendance.php" class="link_attendance">Overall Attendance <strong> <?php echo $att; ?></strong></a>%</td>
			</tr>
			<tr class="menu_left_row_students"><td><hr class="line_left_menu"/></td></tr>
			<tr class="menu_left_row_students"><td><a href="time_table.php" class="link_menu_left">Time Table</a></td></tr>
			<tr class="menu_left_row_students"><td><hr class="line_left_menu"/></td></tr>
			<tr class="menu_left_row_students"><td><a href="assignments.php" class="link_menu_left">Assignments</a></td></tr>
			<tr class="menu_left_row_students"><td><hr class="line_left_menu"/></td></tr>
			<tr class="menu_left_row_students"><td><a href="notes.php" class="link_menu_left">Notes</a></td></tr>
			<tr class="menu_left_row_students"><td><hr class="line_left_menu"/></td></tr>
			<tr class="menu_left_row_students"><td><a href="upcoming_tests.php" class="link_menu_left">Upcoming Tests</a></td></tr>
			<tr class="menu_left_row_students"><td><hr class="line_left_menu"/></td></tr>
			<tr class="menu_left_row_students"><td><a href="results.php" class="link_menu_left">Results</a></td></tr>
			<tr class="menu_left_row_students"><td><hr class="line_left_menu"/></td></tr>
			<tr class="menu_left_row_students"><td><a href="resources/users/" class="link_menu_left">Resources</a></td></tr>
			<tr class="menu_left_row_students"><td><hr class="line_left_menu"/></td></tr>
		</table>		
		</div>
		<?php
		}
		else if($type=="faculty")
		{
		?>
		<div class="div_middle_left">
		<table class="menu_left">
			<?php
				$sql="select faculty_photo from faculties where faculty_id='$uname'";
				$result=mysql_query($sql,$con);
				$row=mysql_fetch_row($result);
			?>
			<tr class="menu_left_row_students"><td>
			<?php
				echo "<img src=".$row[0]." class='profile_pic'  alt='Photo not available' />";
			?>
			</td></tr>
			<tr class="menu_left_row_students">
					  <td class="profile_text">Name:<strong> <?php echo $uname; ?></strong></td>
			</tr>
			<tr class="menu_left_row_students">
				<td class="link_profile_edit"><a href="edit_faculties.php" class="link_edit">edit</a>&nbsp;&nbsp;</td>
			</tr>			
			<tr class="menu_left_row_faculties"><td><hr class="line_left_menu"/></td></tr>
			<tr class="menu_left_row_faculties"><td><a href="edit_attendance.php" class="link_menu_left">Attendance</a></td></tr>
			<tr class="menu_left_row_faculties"><td><hr class="line_left_menu"/></td></tr>
			<tr class="menu_left_row_faculties"><td><a href="edit_assignments.php" class="link_menu_left">Assignments</a></td></tr>
			<tr class="menu_left_row_faculties"><td><hr class="line_left_menu"/></td></tr>
			<tr class="menu_left_row_faculties"><td><a href="calendar.php" class="link_menu_left">Calendar</a></td></tr>			
			<tr class="menu_left_row_faculties"><td><hr class="line_left_menu"/></td></tr>
			<tr class="menu_left_row_faculties"><td><a href="edit_notes.php" class="link_menu_left">Notes</a></td></tr>
			<tr class="menu_left_row_faculties"><td><hr class="line_left_menu"/></td></tr>
			<tr class="menu_left_row_faculties"><td><a href="edit_time_table.php" class="link_menu_left">Students Time<br/><br/> Table</a></td></tr>
			<tr class="menu_left_row_faculties"><td><hr class="line_left_menu"/></td></tr>
			<tr class="menu_left_row_faculties"><td><a href="edit_faculty_time_table.php" class="link_menu_left">Faculties Time<br/><br/> Table</a></td></tr>
			<tr class="menu_left_row_faculties"><td><hr class="line_left_menu"/></td></tr>
			<tr class="menu_left_row_faculties"><td><a href="edit_tests.php" class="link_menu_left">Tests</a></td></tr>
			<tr class="menu_left_row_faculties"><td><hr class="line_left_menu"/></td></tr>
			<tr class="menu_left_row_faculties"><td><a href="edit_results.php" class="link_menu_left">Results</a></td></tr>
			<tr class="menu_left_row_faculties"><td><hr class="line_left_menu"/></td></tr>
		</table>
		
		</div>
		<?php
		}
		else if($type=="admin")
		{
		?>
		<div class="div_middle_left">
		<table class="menu_left">
			<tr class="menu_left_row_admin"><td><a href="cpanel.php" class="link_menu_left">Manage Site</a></td></tr>
			<tr class="menu_left_row_admin"><td><hr class="line_left_menu"/></td></tr>
			<tr class="menu_left_row_admin"><td><a href="edit_attendance.php" class="link_menu_left">Attendance</a></td></tr>
			<tr class="menu_left_row_admin"><td><hr class="line_left_menu"/></td></tr>
			<tr class="menu_left_row_admin"><td><a href="edit_notes.php" class="link_menu_left">Notes</a></td></tr>
			<tr class="menu_left_row_admin"><td><hr class="line_left_menu"/></td></tr>
			<tr class="menu_left_row_admin"><td><a href="edit_assignments.php" class="link_menu_left">Assignments</a></td></tr>
			<tr class="menu_left_row_admin"><td><hr class="line_left_menu"/></td></tr>
			<tr class="menu_left_row_admin"><td><a href="edit_tests.php" class="link_menu_left">Tests</a></td></tr>
			<tr class="menu_left_row_admin"><td><hr class="line_left_menu"/></td></tr>
			<tr class="menu_left_row_admin"><td><a href="edit_results.php" class="link_menu_left">Results</a></td></tr>
			<tr class="menu_left_row_admin"><td><hr class="line_left_menu"/></td></tr>
			<tr class="menu_left_row_admin"><td><a href="edit_time_table.php" class="link_menu_left">Student Time<br/><br/>Table</a></td></tr>
			<tr class="menu_left_row_admin"><td><hr class="line_left_menu"/></td></tr>
			<tr class="menu_left_row_admin"><td><a href="edit_faculty_time_table.php" class="link_menu_left">Faculty Time<br/><br/>Table</a></td></tr>
			<tr class="menu_left_row_admin"><td><hr class="line_left_menu"/></td></tr>
			<tr class="menu_left_row_admin"><td><a href="calendar.php" class="link_menu_left">Calendar</a></td></tr>
			<tr class="menu_left_row_admin"><td><hr class="line_left_menu"/></td></tr>
			<tr class="menu_left_row_admin"><td><a href="edit_home.php" class="link_menu_left">Home</a></td></tr>
			<tr class="menu_left_row_admin"><td><hr class="line_left_menu"/></td></tr>
			<tr class="menu_left_row_admin"><td><a href="edit_directors_desk.php" class="link_menu_left">Director's Desk</a></td></tr>
			<tr class="menu_left_row_admin"><td><hr class="line_left_menu"/></td></tr>
			<tr class="menu_left_row_admin"><td><a href="edit_contact_us.php" class="link_menu_left">Contact us</a></td></tr>
			<tr class="menu_left_row_admin"><td><hr class="line_right_menu"/></td></tr>
			<tr class="menu_left_row_admin"><td><a href="edit_events.php" class="link_menu_right">Events</a></td></tr>
			<tr class="menu_left_row_admin"><td><hr class="line_right_menu"/></td></tr>
			<tr class="menu_left_row_admin"><td><a href="edit_photogallery.php" class="link_menu_right">Photogallery</a></td></tr>			
			<tr class="menu_left_row_admin"><td><hr class="line_right_menu"/></td></tr>
			<tr class="menu_left_row_admin"><td><a href="edit_recruiters.php" class="link_menu_right">Recruiters</a></td></tr>
			<tr class="menu_left_row_admin"><td><hr class="line_left_menu"/></td></tr>			
			<tr class="menu_left_row_admin"><td><a href="edit_placementcell.php" class="link_menu_left">Placement Cell</a></td></tr>
			<tr class="menu_left_row_admin"><td><hr class="line_left_menu"/></td></tr>
			<tr class="menu_left_row_admin"><td><a href="edit_placementstats.php" class="link_menu_left">Placement<br><br> Statistic</a></td></tr>			
		</table>
		</div>
		<?php
		}
		?>
		<div class="div_middle_right">
		