<div class="div_middle_right_right">
			<?php
			if($type=="guest")
			{
			?>
				<div>
				<table class="tbl_login">
					<tr class="tbl_login_row"><td colspan="2"><strong class="font_strong">Login</strong></td></tr>
					<tr class="tbl_login_row"><td>Username</td><td><input type="text" name="uname" size="13"></td></tr>
					<tr class="tbl_login_row"><td>Password</td><td><input type="password" name="passwd" size="13"</td></tr>
					<tr class="tbl_login_row"><td>&nbsp;</td><td><input type="submit" name="login" value="login" /></td></tr>
				</table>
				</div>
			<?php
			}
			?>	
				<div class="div_middle_right_right_middle">
				 <h3 class="title">Calender of Events</h3>
		            <div id="calendar_wrap">
					<table summary="Calendar" align="center">
						<h2 align="center">
						december 2011
						</h3>
						<thead>
							<tr>
								<th abbr="Monday" scope="col" title="Monday">M</th>
								<th abbr="Tuesday" scope="col" title="Tuesday">T</th>
								<th abbr="Wednesday" scope="col" title="Wednesday">W</th>
								<th abbr="Thursday"  scope="col" title="Thursday">T</th>
								<th abbr="Friday" scope="col" title="Friday">F</th>
								<th abbr="Saturday" scope="col" title="Saturday">S</th>
								<th abbr="Sunday" scope="col" title="Sunday">S</th>
							</tr>
						</thead>
						<tfoot>
							<tr>
								<td abbr="September" colspan="3" id="prev"><a href="#" title="View posts for September 2007">&laquo;nov</a></td>
								<td class="pad">&nbsp;</td>
								<td colspan="3" id="next">&nbsp;</td>
							</tr>
						</tfoot>
						<tbody>
							<tr>
								<td>1</td>
								<td>2</td>
								<td>3</td>
								<td id="today">4</td>
								<td>5</td>
								<td>6</td>
								<td>7</td>
							</tr>
							<tr>
								<td>8</td>
								<td>9</td>
								<td>10</td>
								<td>11</td>
								<td>12</td>
								<td>13</td>
								<td>14</td>
							</tr>
							<tr>
								<td>15</td>
								<td>16</td>
								<td>17</td>
								<td>18</td>
								<td>19</td>
								<td>20</td>
								<td>21</td>
							</tr>
							<tr>
								<td>22</td>
								<td>23</td>
								<td>24</td>
								<td>25</td>
								<td>26</td>
								<td>27</td>
								<td>28</td>
							</tr>
							<tr>
								<td>29</td>
								<td>30</td>
								<td>31</td>
								<td class="pad" colspan="4">&nbsp;</td>
							</tr>
						</tbody>
					</table>
				</div>
				
				<?php
				if($type=="admin")
				{
				?>
				<div class="div_middle_right_right_bottom">
					<table class="menu_right">
						<tr class="menu_right_row_students"><td><hr class="line_right_menu"/></td></tr>
						<tr class="menu_right_row_students"><td><a href="#" class="link_menu_right">Accounts</a></td></tr>
						<tr class="menu_right_row_students"><td><hr class="line_right_menu"/></td></tr>
						<tr class="menu_right_row_students"><td><a href="edit_photogallery.php" class="link_menu_right">Photogallery</a></td></tr>
						<tr class="menu_right_row_students"><td><hr class="line_right_menu"/></td></tr>
						<tr class="menu_right_row_students"><td><a href="edit_programmes.php" class="link_menu_right">Programmes</a></td></tr>
						<tr class="menu_right_row_students"><td><hr class="line_right_menu"/></td></tr>
						<tr class="menu_right_row_students"><td><a href="edit_faculties.php" class="link_menu_right">Faculties</a></td></tr>
						<tr class="menu_right_row_students"><td><hr class="line_right_menu"/></td></tr>
						<tr class="menu_right_row_students"><td><a href="edit_events.php" class="link_menu_right">Events</a></td></tr>
						<tr class="menu_right_row_students"><td><hr class="line_right_menu"/></td></tr>
						<tr class="menu_right_row_students"><td><a href="edit_recruiters.php" class="link_menu_right">Recruiters</a></td></tr>
						<tr class="menu_right_row_students"><td><hr class="line_right_menu"/></td></tr>
					</table>					
				</div>
				<?php
				}
				else
				{
				?>
				<div>
					<h3 class="title">Events of the month</h3>
					<center style="padding-bottom:12px;">
						<img class="img_recruiters" src="../images/events.png"/>
					</center>
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
					<td><a class="link_menu" href="#">Cyberoam</a></td>
					<td><a class="link_menu" href="#">Web mail</a></td>
					<td><a class="link_menu" href="#">SICSR Wiki</a></td>
					<td><a class="link_menu" href="#">Moodle</a></td>
					<td><a class="link_menu" href="#">Oracle Express</a></td>
					<td><a class="link_menu" href="#">Saggitarious</a></td>
					</tr>
					</table>
		</div>	
		<div class="div_footer_left">				
			<span class="footer_image">
				<img src="../images/sicsr.jpg" class="img_footer" />
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
			<img src="../images/sicsr-fb.jpg" style="margin-top:5px; margin-bottom:5px;" /><br  />
			15,948 people like Symbiosis Institute of Computer Studies and Research, Pune
			</div>
		</div>
	</div>	
</div>
</body>
</html>