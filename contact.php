<?php  
	
	if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
		include 'db/db.php';

		$name    = $_POST['name'];
		$email   = $_POST['email'];
		$subject = $_POST['subject'];
		$message = $_POST['message'];

		if ($name == '' || empty($name)) {
		  $error[] = '<i class="fa fa-star"></i> Name is required <i class="fa fa-star"></i>';
		}

		if ($email == '' || empty($email)) {
		  $error[] = '<i class="fa fa-star"></i> Email is required <i class="fa fa-star"></i>';
		}

		if ($subject == '' || empty($subject)) {
		  $error[] = '<i class="fa fa-star"></i> Subject is required <i class="fa fa-star"></i>';
		}

		if ($message == '' || empty($message)) {
		  $error[] = '<i class="fa fa-star"></i> Message is required <i class="fa fa-star"></i>';
		}

		if(empty($error)){

					$query 	  = "INSERT INTO message(name,email,subject,message)
								VALUES(:name, :email, :subject, :message)";
			    	$stmt 	  = $db->prepare($query);

			        $stmt     -> bindValue(':name',$name,PDO::PARAM_STR);
			        $stmt     -> bindValue(':email',$email,PDO::PARAM_STR);
			        $stmt     -> bindValue(':subject',$subject,PDO::PARAM_STR);
			        $stmt     -> bindValue(':message',$message,PDO::PARAM_STR);

			    	$result   = $stmt->execute();

			    	if ($result) {
			    		$success[] = "Message send to the Admin.";
			    	}else{
			    		$error[] = 'Messege did not send.';
			    	}

		}
	}
?>

<!DOCTYPE HTML>
<html>
	
	<!--include meta,stylesheet-->
		<?php include 'includes/css.php'; ?>

		<title>::Contact</title>
	

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
							<li><a href="Notice.php">Notice</a></li>
							<!-- <li><a href="event.php">Event</a></li>
							<li><a href="student_forum.php">Student Forum</a></li> -->
							<li><a href="about.php">About</a></li>
							<li class="active"><a href="contact.php">Contact</a></li>
							<li class="btn-cta has-dropdown" style="margin-bottom: -30px">
								<a href="#"><span>LOGIN
								<i class="fas fa-chevron-circle-down"></i></span></a>

								<ul class="dropdown" >
									<li><a href="adminLogin.php">Admin</a></li>
									<li><a href="#">Teacher</a></li>
									<li><a href="#">Stdudent</a></li>
								</ul>
							</li>
						</ul>
					</div>
				</div>
				
			</div>
		</div>
	</nav>


	<div id="fh5co-contact" style="background-image: url(assets/images/img_bg_2.jpg); padding: 10em 0;">
		<div class="container" >
			<div class="row">
				<div class="col-md-5 col-md-push-1 animate-box">
					
					<div class="fh5co-contact-info">
						<h3 style="color: #fff;">Contact Information</h3>
						<ul>
							<li class="address" style="color: lightgray;">198 West 21th Street, <br> Suite 721 Durgapur, Rajshahi</li>
							<li class="phone"><a href="tel://1234567920">+ 1235 2355 98</a></li>
							<li class="email"><a href="mailto:info@yoursite.com">info@sas.com</a></li>
							<li class="url"><a href="http://gettemplates.co">www.sas.com</a></li>
						</ul>
					</div>

				</div>
				<div class="col-md-6 animate-box">
					<h3 style="color: #fff;">Send A Message</h3>
					<form action="" method="POST">
						<div class="row form-group">
							<div class="col-md-12" >
								<!-- <label for="fname">First Name</label> -->
								<input style="color: #fff; border-color: darkgray;" type="text" id="name" name="name" class="form-control" placeholder="Your Name">
							</div>
						</div>

						<div class="row form-group">
							<div class="col-md-12">
								<!-- <label for="email">Email</label> -->
								<input style="color: #fff; border-color: darkgray;" type="email" id="email" name="email" class="form-control" placeholder="Your email address">
							</div>
						</div>

						<div class="row form-group">
							<div class="col-md-12">
								<!-- <label for="subject">Subject</label> -->
								<input style="color: #fff; border-color: darkgray;" type="text" id="subject" name="subject" class="form-control" placeholder="Your subject of this message">
							</div>
						</div>

						<div class="row form-group">
							<div class="col-md-12">
								<!-- <label for="message">Message</label> -->
								<textarea style="color: #fff; border-color: darkgray;" name="message" id="message" cols="30" rows="10" class="form-control" placeholder="Say something about us"></textarea>
							</div>
						</div>
						<div class="form-group">
							<input type="submit" name="submit" value="Send Message" class="btn btn-primary">
						</div>


						<?php if (!empty($error)): ?>

                                    <div class="row">
                                        <div class="col-md-12" style="margin-top: 15px;">

                                                    <?php  
                                                        foreach ($error as $key => $value) {
                                                            echo "<div class='alert alert-danger text-center' role='alert'>";
                                                            echo "<strong>";
                                                            echo $value;
                                                            echo "</strong>";
                                                            echo "</div>";
                                                        }
                                                    ?>

                                        </div>
                                    </div>

                                <?php endif ?>


                                <?php if (!empty($success)): ?>

                                    <div class="row">
                                        <div class="col-md-12" style="margin-top: 15px;">

                                                    <?php  
                                                        foreach ($success as $key => $value) {
                                                            echo "<div class='alert alert-success text-center' role='alert'>";
                                                            echo "<strong>";
                                                            echo $value;
                                                            echo "</strong>";
                                                            echo "</div>";
                                                        }
                                                    ?>

                                        </div>
                                    </div>

                                <?php endif ?>

					</form>		
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

