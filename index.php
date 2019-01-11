<!DOCTYPE HTML>
<html>
	<head>

		<!--include meta,stylesheet-->
		<?php include 'includes/css.php'; ?>

		<title> School Automation System</title>

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
							<li class="active"><a href="index.php">Home</a></li>
							<li><a href="notice.php">Notice</a></li>
							<!-- <li><a href="event.php">Event</a></li> -->
							<!-- <li><a href="student_forum.php">Student Forum</a></li> -->
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

	<aside id="fh5co-hero" class="js-fullheight">
		<div class="flexslider js-fullheight">
			<ul class="slides">
		   	<li style="background-image: url(assets/images/slider/1.jpg);">
		   		<div class="overlay-gradient"></div>
		   		<div class="container">
		   			<div class="row">
			   			<div class="col-md-8 col-md-offset-2 text-center js-fullheight slider-text">
			   				<div class="slider-text-inner">
			   					<h1>School Building</h1>
			   				</div>
			   			</div>
			   		</div>
		   		</div>
		   	</li>
		   	<li style="background-image: url(assets/images/slider/2.jpg);">
		   		<div class="overlay-gradient"></div>
		   		<div class="container">
		   			<div class="row">
			   			<div class="col-md-8 col-md-offset-2 text-center js-fullheight slider-text">
			   				<div class="slider-text-inner">
			   					<h1>Our Teachers</h1>
			   				</div>
			   			</div>
			   		</div>
		   		</div>
		   	</li>
		   	<li style="background-image: url(assets/images/slider/3.jpg);">
		   		<div class="overlay-gradient"></div>
		   		<div class="container">
		   			<div class="row">
			   			<div class="col-md-8 col-md-offset-2 text-center js-fullheight slider-text">
			   				<div class="slider-text-inner">
			   					<h1>New Admission</h1>
			   				</div>
			   			</div>
			   		</div>
		   		</div>
		   	</li>		   	
		  	</ul>
	  	</div>
	</aside>


	<div id="fh5co-about">
		<div class="container">
			<div class="row animate-box">
				<div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
					<h2>Our Honorable</h2>
					<p>Dignissimos asperiores vitae velit veniam totam fuga molestias accusamus alias autem provident. Odit ab aliquam dolor eius.</p>
				</div>
			</div>
			<div class="row">
				<div class="col-md-4 col-sm-4 text-center animate-box" data-animate-effect="fadeIn">
					<div class="fh5co-staff">
						<img src="assets/images/teacher/chairman.jpg" alt="">
						<h3>Md Ashikuzzaman</h3>
						<strong class="role">Chairman</strong>
						<p>It is indeed a matter of unique pride and singular honour for me to be the 
		                Chairman of the Governing Body of BIS&C. I wish BIS&C to be one of the
		                reckoned institutions in the country.</p>
					</div>
				</div>
				<div class="col-md-4 col-sm-4 text-center animate-box" data-animate-effect="fadeIn">
					<div class="fh5co-staff">
						<img src="assets/images/teacher/head.jpg" alt="">
						<h3>Md Anisur Rahman</h3>
						<strong class="role">Head</strong>
						<p>Students are our trusted assets. We, the faculty members, are to act as mentors to transform them into luminous candles. We should nurture them so that they can blossom into flowers and spray everlasting fragrance.</p>
					</div>
				</div>
				<div class="col-md-4 col-sm-4 text-center animate-box" data-animate-effect="fadeIn">
					<div class="fh5co-staff">
						<img src="assets/images/teacher/asHead.jpg" alt="">
						<h3>Md. Nazmul Haque</h3>
						<strong class="role">Ass. Head</strong>
						<p>Our nursing them is to be unprejudiced, altruistic, inexorable and voluntary. The days to be cared, moments to be treasured and memories of success be golden.</p>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div id="fh5co-started" style="background-image:url(images/img_bg_2.jpg);">
		<div class="overlay"></div>
		<div class="container">
			<div class="row animate-box">
				<div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
					<h2>Our Message</h2>
					<p>We teach student effectively so that they receive knowledge to compete to the others!</p>
				</div>
			</div>
		</div>
	</div>


	<!--include footer-->
	<?php include 'includes/footer.php'; ?>
	

	<div class="gototop js-top">
		<a href="#" class="js-gotop"><i class="icon-arrow-up"></i></a>
	</div>
	
	<!--include js-->
	<?php include 'includes/js.php'; ?>
</div>

	</body>
</html>

