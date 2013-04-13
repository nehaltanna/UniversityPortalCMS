<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php 
	if(isset($_POST['login']))
	{
		if(preg_match("[0-9]{11}",$_POST['uname'])) 
		{
			$sql="select count(*) from students where stud_id='$_POST[uname]' and student_passwd='$_POST[passwd]'";
			$result=mysql_query($sql,$con);
			$row=mysql_fetch_row($result);
			if($row[0]==1)
			{
				session_start();
				$_SESSION['username']=$_POST['uname'];
				$_SESSION['type']="student";
				header('refresh: 3; url=students_home.php');			
			}
			else 
			{
				echo "<script>alert(Your student login ID and password does not match.)</script>";
			}		
		}
		else if($_POST['uname']=="admin")
		{
			$p=sha1($_POST['passwd']);
			$sql="select count(*) from admin where admin_passwd='$p'";
			$result=mysql_query($sql,$con);
			$row=mysql_fetch_row($result);
			if($row[0]==1)
			{
				session_start();
				$_SESSION['username']="admin";
				$_SESSION['type']="admin";
				header('refresh: 3; url=admin_home.php');			
			}
			else 
			{
				echo "<script>alert(Your admin login ID and password does not match.)</script>";
			}
		}
		else 
		{
			$sql="select count(*) from faculties where faculty_id='$_POST[uname]' and faculty_passwd='$_POST[passwd]'";
			$result=mysql_query($sql,$con);
			$row=mysql_fetch_row($result);
			if($row[0]==1)
			{
				session_start();
				$_SESSION['username']=$_POST['uname'];
				$_SESSION['type']="faculty";
				header('refresh: 3; url=faculty_home.php');			
			}
			else 
			{
				echo "<script>alert(Your faculty login ID and password does not match.)</script>";
			}
		}
	}
	else 
	{
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
	}	
	if($_GET['logout']=="yes") 
	{
		session_unset();
		$uname="Guest";
		$type="guest";
	}
?>-->

<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="stylesheet" href="../styles/layout.css" type="text/css" />
<title>Welcome To SICSR.</title>

<!--<script type="text/javascript" >
var timeout	= 500;
var closetimer	= 0;
var ddmenuitem	= 0;

// open hidden layer
function mopen(id)
{	
	// cancel close timer
	mcancelclosetime();

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
</script>-->

</head>
<body background="../images/background-001.jpg">
<div class="div_main">

	<div class="div_header">
	
		<div class="div_header_top">
		  <strong class="font_strong">Welcome <a href="edit_student.php" class="link_regular"><?php echo $uname; ?></a>&nbsp;(&nbsp;
		 <?php
		 	if($uname=="Guest")
		 	{
		 		echo "<a href='home.php' class='link_regular'>Login</a>";	
		 	}
		 	else 
		 	{
		 		echo "<a href='home.php?logout=yes' class='link_regular'>Logout</a>";
		 	}
		 ?>
		 &nbsp;)&nbsp;</strong>
		</div>
		
		<div class="div_header_middle">
			<img src="../images/sicsr-head.jpg" class="img_header"/>
		</div>
		
		<div class="div_header_bottom">
		  <form action="#" method="post" id="sitesearch">	
          	<strong class="font_strong">Search&nbsp;&nbsp;</strong>
          	<input type="text" value="Search In Website" size="30" />
          	<input name="image" type="image" class="search_button" id="search" src="../images/magnifying_glass.png" alt="Search" />
         </form>
          	&nbsp;&nbsp; &nbsp; 
		</div>
	</div>
	
	<div class="div_menu">
	 	<table class="menu_table">
		<tr>
		<td><a class="link_menu" href="home.php">Home</a></td>
		<td><a class="link_menu" href="#" onmouseover="mopen('m1')" onmouseout="mclosetime()">Programmes</a></td>
		<div id="m1" onmouseover="mcancelclosetime()" onmouseout="mclosetime()">
		<?php
				$sql="select prg_id from programmes";
				$result=mysql_query($sql,$con);
				while($row=mysql_fetch_row($result))
				{
					echo "<a href=programmes.php?pid=".$row[0].">$row[0]</a>";
				}
		?>
		</div>          			
		<td><a class="link_menu" href="faculty.php">Faculty</a></td>
		<td><a class="link_menu" href="#" onmouseover="mopen('m2')" onmouseout="mclosetime()">PhotoGallery</a></td>
		<div id="m2" onmouseover="mcancelclosetime()" onmouseout="mclosetime()">
		<?php
				$sql="select event_id from events";
				$result=mysql_query($sql,$con);
				while($row=mysql_fetch_row($result))
				{
					echo "<a href=photogallery.php?gid=".$row[0].">$row[0]</a>";
				}
		?>
		</div> 
		<td><a class="link_menu" href="#" onmouseover="mopen('m3')" onmouseout="mclosetime()">Placement</a></td>
		<div id="m3" onmouseover="mcancelclosetime()" onmouseout="mclosetime()">
			<a href="placementcell.php">Placement Cell</a>
			<a href="placementstats.php">Placement Statistic</a>
		</div>
		<td><a class="link_menu" href="#" onmouseover="mopen('m4')" onmouseout="mclosetime()">Events</a></td>
		<?php
				$sql="select event_id from events";
				$result=mysql_query($sql,$con);
				while($row=mysql_fetch_row($result))
				{
					echo "<a href=events.php?eid=".$row[0].">$row[0]</a>";
				}
		?>
		<td><a class="link_menu" href="contactus.php">ContactUS</a></td>						
		</tr>
		<div style="clear:both"></div>
		</table>
	</div>-->
	
	<!--<div class="div_middle">
		<?php
			if($type=="guest")
			{
		?>
		<div class="div_middle_left">
		<table class="menu_left">
		<tr class="menu_left_row"><td><a href="#" class="link_menu_left">Web mail</a></td></tr>
		<tr class="menu_left_row"><td><hr class="line_left_menu" /></td></tr>
		<tr class="menu_left_row"><td><a href="#" class="link_menu_left">SICSR Wiki</a></td></tr>
		<tr class="menu_left_row"><td><hr class="line_left_menu" /></td></tr>
		<tr class="menu_left_row"><td><a href="#" class="link_menu_left">Moodle</a></td></tr>
		<tr class="menu_left_row"><td><hr class="line_left_menu" /></td></tr>
		<tr class="menu_left_row"><td><a href="#" class="link_menu_left">Saggitarious</a></td></tr>
		<tr class="menu_left_row"><td><hr class="line_left_menu" /></td></tr>
		<tr class="menu_left_row"><td><a href="#" class="link_menu_left">Oracle Express</a></td></tr>
		<tr class="menu_left_row"><td><hr class="line_left_menu" /></td></tr>
		<tr class="menu_left_row"><td><a href="#" class="link_menu_left">Take a tour</a></td></tr>
		<tr class="menu_left_row"><td><hr class="line_left_menu" /></td></tr>
		<tr class="menu_left_row"><td><a href="#" class="link_menu_left">Director's Desk</a></td></tr>

		<tr><td><a href="#" style="text-decoration:none;"><h3 class="title">Our Recruiters</h3></a></td></tr>
		<tr class="menu_left_row">
			<td>
			<marquee direction="up">
			<?php
				$dir="images/recruiters";
				if (is_dir($dir)) 
	   		{
	     			while($f=scandir($dir)) 
	     			{
	       			if($f=="." || $f=="..")
	       			{
	       				continue;
	       			}
	       			else 
	       			{
	       				echo "<img class=img_recruiters src=".$dir."/".$f.">";
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
		<form id="profile_display">
		<table class="menu_left">
			<?php
				$sql="select fname,lname,student_photo from students where stud_id='$uname'";
				$result=mysql_query($sql,$con);
				$row=mysql_fetch_row($result);
			?>
			<tr class="menu_left_row_students"><td>
			<?php
				echo "<img src=images/students/".$row[2]." class='profile_pic' />";
			?>
			</td></tr>
			<tr class="menu_left_row_students">
					  <td class="profile_text">Name: <?php echo "$row[0] $row[1]"; ?> </td>
			</tr>
			<tr class="menu_left_row_students">
					<td class="profile_text">PRN : <?php echo "$uname"; ?> </td>
			</tr>
			<tr class="menu_left_row_students">
				<td class="link_profile_edit"><a href="edit_student.php" class="link_edit">edit</a>&nbsp;&nbsp;</td>
			</tr>
			<tr class="menu_left_row_students">
			<?php
				$p=0;
				$t=0;
				$sql="select distinct start_date,end_date from attendance where stud_id='$uname'";
				$result = mysql_query($sql,$con);
				while($row = mysql_fetch_row($result)) 
				{
					$sql1="select sub_id,total_lectures,no_absent from attendance where stud_id='$prn' and start_date='$row[0]' and end_date='$row[1]'";
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
				<td class="profile_text"><a href="attendance.php" class="link_attendance">Overall Attendance <?php echo $att; ?></a>%</td>
			</tr>
			<tr class="menu_left_row_students"><td><hr class="line_left_menu"/></td></tr>
			<tr class="menu_left_row_students"><td><a href="notes.php" class="link_menu_left">Notes</a></td></tr>
			<tr class="menu_left_row_students"><td><hr class="line_left_menu"/></td></tr>
			<tr class="menu_left_row_students"><td><a href="resources/users/" class="link_menu_left">Resources</a></td></tr>
			<tr class="menu_left_row_students"><td><hr class="line_left_menu"/></td></tr>
			<tr class="menu_left_row_students"><td><a href="assignment.php" class="link_menu_left">Assignments</a></td></tr>
			<tr class="menu_left_row_students"><td><hr class="line_left_menu"/></td></tr>
			<tr class="menu_left_row_students"><td><a href="posts.php" class="link_menu_left">Posts</a></td></tr>
			<tr class="menu_left_row_students"><td><hr class="line_left_menu"/></td></tr>
			<tr class="menu_left_row_students"><td><a href="time_table.php" class="link_menu_left">Time Table</a></td></tr>
			<tr class="menu_left_row_students"><td><hr class="line_left_menu"/></td></tr>
			<tr class="menu_left_row_students"><td><a href="results.php" class="link_menu_left">Results</a></td></tr>
			<tr class="menu_left_row_students"><td><hr class="line_left_menu"/></td></tr>
		</table>
		</form>
		</div>
		<?php
		}
		else if($type=="faculty")
		{
		?>-->
		<!--<div class="div_middle_left">
		<table class="menu_left">
			<?php
				$sql="select faculty_photo from faculties where faculty_id='$uname'";
				$result=mysql_query($sql,$con);
				$row=mysql_fetch_row($result);
			?>
			<tr class="menu_left_row_students"><td>
			<?php
				echo "<img src=images/faculties/".$row[0]." class='profile_pic' />";
			?>
			</td></tr>
			<tr class="menu_left_row_students">
					  <td class="profile_text">Name: <?php echo $uname; ?></td>
			</tr>
			<tr class="menu_left_row_students">
				<td class="link_profile_edit"><a href="edit_faculty.php" class="link_edit">edit</a>&nbsp;&nbsp;</td>
			</tr>
			<tr class="menu_left_row_students"><td><hr class="line_left_menu"/></td></tr>
			<tr class="menu_left_row_students"><td><a href="edit_attendance.php" class="link_menu_left">Attendence</a></td></tr>
			<tr class="menu_left_row_students"><td><hr class="line_left_menu"/></td></tr>
			<tr class="menu_left_row_students"><td><a href="edit_notes.php" class="link_menu_left">Notes</a></td></tr>
			<tr class="menu_left_row_students"><td><hr class="line_left_menu"/></td></tr>
			<tr class="menu_left_row_students"><td><a href="resources/" class="link_menu_left">Resources</a></td></tr>
			<tr class="menu_left_row_students"><td><hr class="line_left_menu"/></td></tr>
			<tr class="menu_left_row_students"><td><a href="edit_assignments.php" class="link_menu_left">Assignments</a></td></tr>
			<tr class="menu_left_row_students"><td><hr class="line_left_menu"/></td></tr>
			<tr class="menu_left_row_students"><td><a href="posts.php" class="link_menu_left">Posts</a></td></tr>
			<tr class="menu_left_row_students"><td><hr class="line_left_menu"/></td></tr>
			<tr class="menu_left_row_students"><td><a href="edit_time_table.php" class="link_menu_left">Time Table</a></td></tr>
			<tr class="menu_left_row_students"><td><hr class="line_left_menu"/></td></tr>
			<tr class="menu_left_row_students"><td><a href="edit_results.php" class="link_menu_left">Results</a></td></tr>
		</table>
		
		</div>-->
		<!--<?php
		}
		else if($type=="admin")
		{
		?>-->
		<!--<div class="div_middle_left">
		<table class="menu_left">
			<tr class="menu_left_row_students">
					  <td class="profile_text">Name: admin</td>
			</tr>
			<tr class="menu_left_row_students">
				<td class="link_profile_edit"><a href="admin.php" class="link_edit">edit</a>&nbsp;&nbsp;</td>
			</tr>
			<tr class="menu_left_row_students"><td><hr class="line_left_menu"/></td></tr>
			<tr class="menu_left_row_students"><td><a href="edit_attendance.php" class="link_menu_left">Attendence</a></td></tr>
			<tr class="menu_left_row_students"><td><hr class="line_left_menu"/></td></tr>
			<tr class="menu_left_row_students"><td><a href="edit_notes.php" class="link_menu_left">Notes</a></td></tr>
			<tr class="menu_left_row_students"><td><hr class="line_left_menu"/></td></tr>
			<tr class="menu_left_row_students"><td><a href="resources/" class="link_menu_left">Resources</a></td></tr>
			<tr class="menu_left_row_students"><td><hr class="line_left_menu"/></td></tr>
			<tr class="menu_left_row_students"><td><a href="edit_assignments.php" class="link_menu_left">Assignments</a></td></tr>
			<tr class="menu_left_row_students"><td><hr class="line_left_menu"/></td></tr>
			<tr class="menu_left_row_students"><td><a href="edit_posts.php" class="link_menu_left">Posts</a></td></tr>
			<tr class="menu_left_row_students"><td><hr class="line_left_menu"/></td></tr>
			<tr class="menu_left_row_students"><td><a href="edit_time_table.php" class="link_menu_left">Time Table</a></td></tr>
			<tr class="menu_left_row_students"><td><hr class="line_left_menu"/></td></tr>
			<tr class="menu_left_row_students"><td><a href="edit_results.php" class="link_menu_left">Results</a></td></tr>
		</table>
		
		</div>-->
		<!--<?php
		}
		?>-->
		<div class="div_middle_right">