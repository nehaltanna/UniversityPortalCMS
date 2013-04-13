<style type="text/css">
.highlight { color: #ffffff; background-color:#990B09; !important; font-weight: bold; }
.highlight2 { color: #ffffff; background-color: #7F7F7F; !important; font-weight: bold; }
</style>
<?php
	$calender_alert=array();
	$calender_date=array();
	$sql = "SELECT * from calendar_alert";
	$result = mysql_query($sql,$con);
	$row = mysql_fetch_row($result);
//	$query1=mysql_query("select * from calendar_alert where avi=2");
//	$row1=mysql_fetch_row($query1)or die(mysql_error());
	/*$dd=str_replace('-','',$row[1]);
	while($row = mysql_fetch_row($result))
	{
		$dd=str_replace('-','',$row[1]);		
		array_push($calendar_alert,$row[0]);
		array_push($calendar_date,$dd);	
	}
	$i=0;*/
?>
<div class="div_middle_right_right">
			<?php
			if($type=="guest")
			{
			?>
				<div>
				<form action="#" method="post">
				<table class="tbl_login">
					<tr class="tbl_login_row"><td colspan="2"><strong class="font_strong">Login</strong></td></tr>
					<tr class="tbl_login_row"><td>Username</td><td><input type="text" name="uname" size="13"></td></tr>
					<tr class="tbl_login_row"><td>Password</td><td><input type="password" name="passwd" size="13"</td></tr>
					<tr class="tbl_login_row"><td>&nbsp;</td><td><input type="submit" name="login" value="login" /></td></tr>
				</table>
				</form>
				</div>
			<?php
			}
			if($type!="admin")
			{
			?>	
				<div class="div_middle_right_right_middle">
				 <h3 class="title">Calender of Events</h3>
				 <div>
				<table>
			      <tr>
			        <td><div id="cont"></div></td>
			        <td></td>
			      </tr>
			   </table>
			   <script type='text/javascript'>//<![CDATA[
					
			     var DATE_INFO = {};
			      
			      function getDateInfo(date, wantsClassName) {
			              var as_number = Calendar.dateToInt(date);
			              
			              var row0 = "<?php echo $row[0] ?>"; 
			              var row1 = "<?php echo str_replace('-','',$row[1]) ?>";
			              /*var row2= "<?php echo $row1[0]?>"
						  	  var row3= "<?php echo str_replace('-','',$row1[1])?>"*/								
			              if (as_number == row1)
								{	        	   
										//document.write("<?php $row= mysql_fetch_row($result); ?>");
						//in above line I want to fetch next record...but its not working...I googled it..it says ajax is required.	
			                      return {
			                              klass   : "highlight2",
			                              tooltip : "<div style='text-align:center; color:#990B09; font-weight: bolder;'>"+row0+"</div>"
			                      };
			               }
	/*		              else if(as_number==row3)
						   	{	        	   

								//in above line I want to fetch next record...but its not working...I googled it..it says ajax is required.	
			                      return {
			                              klass   : "highlight2",
			                              tooltip : "<div style='text-align:center; color:#990B09; font-weight: bolder;'>"+row2+"</div>"
			                      };
			               }*/
			              return DATE_INFO[as_number];
			      };
			
			      var cal = Calendar.setup({
			              cont     : 'cont',
			              fdow     : 1,
			              date     : new Date(),
			              dateInfo : getDateInfo
			      });
			
			    //]]></script>
				 </div>		  
				</div>
				
				<?php
				}
				if($type=="admin")
				{
				?>
				<div class="div_middle_right_right_bottom">
					<table class="menu_right">
						<tr class="menu_left_row_admin"><td></td></tr>
						<tr class="menu_left_row_admin"><td><a href="edit_programmes.php" class="link_menu_left">Manage<br><br> Programmes</a></td></tr>
						<tr class="menu_left_row_admin"><td><hr class="line_left_menu"/></td></tr>
						<tr class="menu_left_row_admin"><td><a href="edit_batches.php" class="link_menu_left">Manage Batches</a></td></tr>
						<tr class="menu_left_row_admin"><td><hr class="line_left_menu"/></td></tr>
						<tr class="menu_left_row_admin"><td><a href="edit_groups.php" class="link_menu_left">Manage Groups</a></td></tr>
						<tr class="menu_left_row_admin"><td><hr class="line_left_menu"/></td></tr>
						<tr class="menu_left_row_admin"><td><a href="edit_groups_detail.php" class="link_menu_left">Manage Groups<br><br> Detail</a></td></tr>
						<tr class="menu_left_row_admin"><td><hr class="line_left_menu"/></td></tr>
						<tr class="menu_left_row_admin"><td><a href="edit_courses.php" class="link_menu_left">Manage<br><br> Subjects</a></td></tr>
						<tr class="menu_left_row_admin"><td><hr class="line_left_menu"/></td></tr>
						<tr class="menu_left_row_admin"><td><a href="edit_manage_students.php" class="link_menu_left">Manage<br><br> Students</a></td></tr>
						<tr class="menu_left_row_admin"><td><hr class="line_left_menu"/></td></tr>
						<tr class="menu_left_row_admin"><td><a href="edit_manage_faculties.php" class="link_menu_left">Manage<br><br> Faculties</a></td></tr>
						<tr class="menu_left_row_admin"><td><hr class="line_left_menu"/></td></tr>
						<tr class="menu_left_row_admin"><td><a href="edit_admin.php" class="link_menu_left">Manage<br><br> Passwords</a></td></tr>
						<tr class="menu_left_row_admin"><td><hr class="line_right_menu"/></td></tr>
						<tr class="menu_left_row_admin"><td><a href="assignments/" class="link_menu_left">Manage<br><br> Assignments</a></td></tr>
						<tr class="menu_left_row_admin"><td><hr class="line_left_menu"/></td></tr>			
						<tr class="menu_left_row_admin"><td><a href="resources/" class="link_menu_left">Manage<br><br> Resources</a></td></tr>						
						<tr class="menu_left_row_admin"><td><hr class="line_left_menu"/></td></tr>
						<tr class="menu_left_row_admin"><td><a href="posts.php" class="link_menu_left">Posts</a></td></tr>
						<tr class="menu_left_row_admin"><td><hr class="line_left_menu"/></td></tr>
						<tr class="menu_left_row_admin"><td><a href="send_post.php" class="link_menu_left">Send Post</a></td></tr>
						<tr class="menu_left_row_admin"><td><hr class="line_left_menu"/></td></tr>
						<tr class="menu_left_row_admin"><td><a href="delete_posts.php" class="link_menu_left">Manage Posts</a></td></tr>
						
					</table>			
				</div>
				<?php
				}
				else if($type=="student")
				{
				?>
				<div>
				<br/>
					<table class="menu_left">						
						<tr class="menu_left_row_students"><td><hr class="line_left_menu"/></td></tr>
						<tr class="menu_left_row_students"><td><a href="posts.php" class="link_menu_left">Posts</a></td></tr>
						<tr class="menu_left_row_students"><td><hr class="line_left_menu"/></td></tr>
						<tr class="menu_left_row_students"><td><a href="send_post.php" class="link_menu_left">Send Post</a></td></tr>
						<tr class="menu_left_row_students"><td><hr class="line_left_menu"/></td></tr>
						<tr class="menu_left_row_students"><td><a href="delete_posts.php" class="link_menu_left">Manage Posts</a></td></tr>
						<tr class="menu_left_row_students"><td><hr class="line_left_menu"/></td></tr>
					</table>
				</div>
				<?php
				}
				else if($type=="faculty")
				{
				?>
				<div>
				<br/>
					<table class="menu_left">						
						<tr class="menu_left_row_faculties"><td><hr class="line_left_menu"/></td></tr>
						<tr class="menu_left_row_faculties"><td><a href="resources/" class="link_menu_left">Resources</a></td></tr>
						<tr class="menu_left_row_faculties"><td><hr class="line_left_menu"/></td></tr>
						<tr class="menu_left_row_faculties"><td><a href="assignments/" class="link_menu_left">Manage<br/><br/> Assignments</a></td></tr>
						<tr class="menu_left_row_faculties"><td><hr class="line_left_menu"/></td></tr>
						<tr class="menu_left_row_faculties"><td><a href="faculty_time_table.php" class="link_menu_left">Time Table</a></td></tr>
						<tr class="menu_left_row_faculties"><td><hr class="line_left_menu"/></td></tr>
						<tr class="menu_left_row_faculties"><td><a href="posts.php" class="link_menu_left">Posts</a></td></tr>
						<tr class="menu_left_row_faculties"><td><hr class="line_left_menu"/></td></tr>
						<tr class="menu_left_row_faculties"><td><a href="send_post.php" class="link_menu_left">Send Post</a></td></tr>
						<tr class="menu_left_row_faculties"><td><hr class="line_left_menu"/></td></tr>
						<tr class="menu_left_row_faculties"><td><a href="delete_posts.php" class="link_menu_left">Manage Posts</a></td></tr>
						<tr class="menu_left_row_faculties"><td><hr class="line_left_menu"/></td></tr>
					</table>
				</div>
				<?php
				}
				else
				{
				?>
				<div>
				<br/>
					<table class="menu_left">						
					</table>
				</div>
				<?php
				}
				?>
			</div>
		</div>
	</div>
		
	<div class="div_footer">
		<div class="footer_menu">
					<table class="menu_table">
					<tr>
					<td><a class="link_menu" href="10.10.26.31">Cyberoam</a></td>
					<td><a class="link_menu" href="http://mail.sicsr.ac.in">Web mail</a></td>
					<td><a class="link_menu" href="http://wiki.sdrclabs.in">SICSR Wiki</a></td>
					<td><a class="link_menu" href="http://elearning.sdrclabs.in">Moodle</a></td>
					<td><a class="link_menu" href="10.10.22.30/moon/apache/">Oracle Express</a></td>
					<td><a class="link_menu" href="10.10.21.35">Saggitarious</a></td>
					</tr>
					</table>
		</div>	
		<div class="div_footer_left">				
			<span class="footer_image">
				<img src="images/sicsr.jpg" class="img_footer" alt="Image not available" />
			</span>
			<span class="div_footer_left_text">
			<u>SICSR CENTER</u><br />
			&nbsp;Atur Center, <br />
			&nbsp;Gokhlenagar Road,<br />
			&nbsp;Modal Colony,<br />
			&nbsp;Pune - 16<br />
			</span>
		</div>
		
		<div class="div_footer_right">
		
		  <div class="div_footer_right_left">
				<u><span style="font-size:24px;line-height:34px;">About SICSR</span></u><br />
				A national leader in graduation rates, undergraduate research, and graduate, SICSR offers the benefits of larger schools with the student-centered approach of  undergraduate college. </div>
			
			<div class="div_footer_right_right">
			<span style="font-size:24px;">
			Follow us on<br  /></span>
			<img src="images/sicsr-fb.jpg" style="margin-top:5px; margin-bottom:5px;" alt="not available" /><br  />
			15,948 people like Symbiosis Institute of Computer Studies and Research, Pune
			</div>
		</div>
	</div>	
</div>
</body>
</html>