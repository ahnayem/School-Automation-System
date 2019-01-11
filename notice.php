<!DOCTYPE html>
<html>
	<head>

		<!--include meta,stylesheet-->
		<?php include 'includes/css.php'; ?>

		<title> ::Notice Board</title>

		<style type="text/css">
			body{
				background-color: #232426;
			}

			h2{
				color: white;
			}

			td{
				color: #ddd;
			}

			.notice {
			    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
			    border-collapse: collapse;
			    width: 100%;
			}

			.notice td, .notice th {
			    border: 0px solid #ddd;
			    padding: 8px;
			}

			.notice tr:nth-child(odd){background-color: #555555;}

			.notice th {
			    padding-top: 12px;
			    padding-bottom: 12px;
			    text-align: left;
			    background-color: #4CAF50;
			    color: white;
			}

		</style>
	</head>


	<body>	
		<div class="fh5co-loader"></div>
		<div id="page">
			<nav class="fh5co-nav navbar navbar-default navbar-fixed-top" role="navigation">
					<div class="top-menu">
						<div class="container">
							<div class="row">
								<div class="col-xs-2">
									<div id="fh5co-logo"><a href="index.php" style="font-size: 30px">SAS<span>.</span></a></div>
								</div>
								<div class="col-xs-10 text-right menu-1">
									<ul>
										<li><a href="index.php">Home</a></li>
										<li class="active"><a href="notice.php">Notice</a></li>
										<!-- <li><a href="event.php">Event</a></li>
										<li><a href="student_forum.php">Student Forum</a></li> -->
										<li><a href="about.php">About</a></li>
										<li><a href="contact.php">Contact</a></li>
										<li class="btn-cta has-dropdown" style="margin-bottom: -30px">
											<a href="#"><span>LOGIN
											<i class="fas fa-chevron-circle-down"></i></span></a>

											<ul class="dropdown" >
												<li><a href="adminLogin.php">Admin</a></li>
												<li><a href="teacherLogin.php">Teacher</a></li>
												<li><a href="student_login.php">Stdudent</a></li>
											</ul>
										</li>
									</ul>
								</div>
							</div>
							
						</div>
					</div>
			</nav>

			<div id="fh5co-about">
				<div class="container" style="padding: 40px;">
					<h2 align="center">:: Notice Board ::</h2><br>

					<table class="notice">

					<?php 
						include 'db/db.php';

						$query    = "SELECT * FROM post ORDER BY date DESC";
					    $stmt           = $db->prepare($query);
					    $result         = $stmt->execute();

						while($row = $stmt->fetch()){ ?>

						<tr>
							<td><b style="color: #f2415e;">Title: <?php echo $row['title']; ?></b><br>
							Detail: <?php echo $row['description']; ?><br><br>
							

							<?php if($row['pdf_file_name']){ ?>
								File: <i class="fa fa-file-pdf" style="font-size:20px;color:red"></i> 
								<?php echo $file=$row['pdf_file_name']; ?>

								<a href=<?php echo '"assets/file/pdf/'.$file.'"'; ?> class="btn btn-default" download>Download</a><br>

								Date: <?php 
								$sqlDateTime=$row['date']; 
								$time = strtotime($sqlDateTime);
								$dateTime = date("m/d/y g:i A", $time);
								echo $dateTime;
							?><br>
								</td>
							<?php } ?>
		    			</tr>

						<?php } ?>

					</table>
				</div>
			</div>

				

				<div class="gototop js-top">
					<a href="#" class="js-gotop"><i class="icon-arrow-up"></i></a>
				</div>
				
				<!--include js-->
				<?php include 'includes/js.php'; ?>
		</div>
	</body>
</html>

