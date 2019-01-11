	<div class="main-content">
		<div class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-left" id="cbp-spmenu-s1">
				<!--left-fixed -navigation-->
				<aside class="sidebar-left">
			      <nav class="navbar navbar-inverse">
			          <div class="navbar-header">
			            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".collapse" aria-expanded="false">
			            <span class="sr-only">Toggle navigation</span>
			            <span class="icon-bar"></span>
			            <span class="icon-bar"></span>
			            <span class="icon-bar"></span>
			            </button>
			            <h1><a class="navbar-brand" href="index.php" ><span class="fa fa-area-chart"></span>
			            	<span style="color: #F95959"> SAS</span><span class="dashboard_text">Admin dashboard</span></a></h1>
			          </div>
			          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			            <ul class="sidebar-menu">
			              <li class="header">NAVIGATION</li>
			             
						  <li class="treeview">
			                <a href="register.php">
			                <i class="fa fa-edit"></i>
			                <span>Register</span>
			                </a>
			              </li>
						  <li>
			                <a href="assignSub.php">
			                <i class="fa fa-th"></i> <span>Assign Subject</span>
			                </a>
			              </li>

 						<li class="treeview">
							<a href="result_process.php">
								<i class="fa fa-table"></i> 
								<span>Result Process</span>
							</a>
						</li>
			              <li class="treeview">
			                <a href="update_notice.php">
			                	<i class="fa fa-wpforms"></i> <span>Upload Notice</span>
			                </a>
			              </li>

			              <li class="treeview">
			                <a href="update_student_database.php">
			                	<i class="fa fa-cogs"></i> <span>Student Database Update</span>
			                </a>
			              </li>
			              
			              <li class="treeview">
			                <a href="search.php">
			                	<i class="glyphicon glyphicon-search"></i> <span>Search </span>
			            	</a>
			              </li>

			              <li class="treeview">
			                <a href="inbox.php">
			                	<i class="fa fa-envelope"></i> <span>Mailbox</span>
			            	</a>
			                
			              </li>
			              
			          <!-- /.navbar-collapse -->
			      </nav>
		    	</aside>
		</div>

			<div class="sticky-header header-section ">
				<div class="header-left">
					<!--toggle button start-->
					<button id="showLeftPush"><i class="fa fa-bars"></i></button>
					<!--toggle button end-->
					<div class="profile_details_left"><!--notifications of menu start -->
						<ul class="nofitications-dropdown">
							<li class="dropdown head-dpdn">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-envelope"></i><span class="badge">3</span></a>
								<ul class="dropdown-menu">
									<li>
										<div class="notification_header">
											<h3>You have 3 new messages</h3>
										</div>
									</li>
									
									<li>
										<div class="notification_bottom">
											<a href="#">See all messages</a>
										</div> 
									</li>
								</ul>
							</li>
							<li class="dropdown head-dpdn">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-bell"></i><span class="badge blue">4</span></a>
								<ul class="dropdown-menu">
									<li>
										<div class="notification_header">
											<h3>You have 4 new notification</h3>
										</div>
									</li>
									
									 <li>
										<div class="notification_bottom">
											<a href="#">See all notifications</a>
										</div> 
									</li>
								</ul>
							</li>		
						</ul>
						<div class="clearfix"> </div>
					</div>
					<!--notification menu end -->
					<div class="clearfix"> </div>
				</div>
				<div class="header-right">
					
					
					
					<div class="profile_details">		
						<ul>
							<li class="dropdown profile_details_drop">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
									<div class="profile_img">	
									<span class="prfil-img"><img src="assets/images/admin/<?php echo $row_admin['admin_profile_picture'] ?>"  alt="" style="height: 50px; width: 50px;"> </span> 
										<div class="user-name">
											<p>
												<?php 
					                            	echo $row_admin['admin_name'];
					                        	?>
					                        	
					                        </p>
											<span>Administrator</span>
										</div>
										<i class="fa fa-angle-down lnr"></i>
										<i class="fa fa-angle-up lnr"></i>
										<div class="clearfix"></div>	
									</div>	
								</a>
								<ul class="dropdown-menu drp-mnu">
									<li> <a href="profile.php"><i class="fa fa-suitcase"></i> Profile</a> </li> 
									<li> <a href="signout.php"><i class="fa fa-sign-out"></i> Logout</a> </li>
								</ul>
							</li>
						</ul>
					</div>
				<div class="clearfix"> </div>				
			</div>
			<div class="clearfix"> 
			</div>	
		</div>
		<!-- //header-ends -->