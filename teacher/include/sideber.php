<!--/sidebar-menu-->
				<div class="sidebar-menu">
					<header class="logo">
					<a href="#" class="sidebar-icon"> <span class="fa fa-bars"></span> </a> <a href="index.html"> <span id="logo"> <h4 style="color: white">Teacher Pannel</h4></span> 
					<!--<img id="logo" src="" alt="Logo"/>--> 
				  </a> 
				</header>
			<div style="border-top:1px solid rgba(69, 74, 84, 0.7)"></div>
			<!--/down-->
							<div class="down">	
									  <a href=""><img src="assets/images/teacher/<?php echo $row_teacher['teacher_profile_picture'] ?>" alt="" style="height: 80px; width: 80px;"></a>
									  <a href="index.html"><span class=" name-caret">
									  			<?php 
					                            	echo $row_teacher['teacher_name'];
					                        	?>
									  </span></a>
									 <p>
									 	<?php 
					                      	echo $row_teacher['teacher_designation'];
					                    ?>
					                 </p>
									<ul>
									<li><a class="tooltips" href="profile.php"><span>Profile</span>
										<i class="lnr lnr-user"></i></a></li>
										<li><a class="tooltips" href=""><span>Settings</span>
											<i class="lnr lnr-cog"></i></a></li>
										<li><a class="tooltips" href="signout.php"><span>Log out</span>
											<i class="lnr lnr-power-switch"></i></a></li>
										</ul>
									</div>
							   <!--//down-->
                           <div class="menu">
								<ul id="menu" >
									<li id="menu-academico" >
										<a href="takenCourse.php"><i class="fa fa-table"></i> <span> Course Taken</span></a>
									</li>
										 <li id="menu-academico" ><a href="markInput.php"><i class="fa fa-file-text-o"></i> <span>Mark Input</span></a>
										 </li>
								  </ul>
								</div>
							  </div>
							  <div class="clearfix"></div>		
					</div>