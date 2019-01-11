<?php  
    ob_start();
    session_start();
    session_regenerate_id();

    /*
    * Here we check whether the remember_me cookie is set or not
    */
    if (isset($_COOKIE['remember_me'])) {

        include 'db/db.php';

        $cookie = $_COOKIE['remember_me'] ?? false;
        $token_hash = hash_hmac('sha256',$cookie,'nayem');

        $query              = "SELECT * FROM remember_login WHERE token_hash = :token_hash";
        $stmt               = $db->prepare($query);
        $stmt               -> bindValue(':token_hash',$token_hash, PDO::PARAM_STR);
        $result             = $stmt->execute();
        $row                = $stmt->fetch();
            
        if ($row) {
            header('location: student');
        }

        if (isset($_SESSION['student_id'])) {
            header('location: student');
        }
        
    }else{
        if (isset($_SESSION['student_id'])) {
            header('location: student');
        }
    }


    /*
    * If someone press the Sign In button OR
    * If server request method is set to post & the name is signin.
    * Thess code will execute.
    */
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['signin'])) {
        include 'db/db.php';

        /*
        * Input data from Form
        */
        $sid            = $_POST['sid'];
        $password       = $_POST['password'];
        $remember_me    = isset($_POST['remember_me']);


        /*
        * Validation [Empty Check]
        */

        if ($sid == '' || empty($sid)) {
          $error[] = '<i class="fa fa-star"></i> ID is required <i class="fa fa-star"></i>';
        }

        if ($password == '' || empty($password)) {
          $error[] = '<i class="fa fa-star"></i> Password is required <i class="fa fa-star"></i>';
        }



        /*
        * If there is not error
        * then these code will execute
        */
        if (empty($error)) {

            $query_status           = "SELECT * FROM student WHERE id = :sid AND status = 1";
            $stmt                   = $db->prepare($query_status);
            $stmt                   -> bindValue(':sid',$sid,PDO::PARAM_STR);
            $result                 = $stmt->execute();
            $row                    = $stmt->fetch();

            /*
            * If ID matched to the database 
            * and status is 1
            * then these code will execute
            */
            if ($row) {
                $query_id    = "SELECT * FROM student WHERE id = '$sid'";
                $stmt           = $db->prepare($query_id);
                $result         = $stmt->execute();
                $row            = $stmt->fetch();
                if ($row) {


                        if (password_verify($password,$row['password'])) {


                            /*
                            * If someone press the Remember me checkbok
                            * then these code will execute
                            * otherwise only Session will set.
                            */
                            if (isset($_POST['remember_me'])) {

                                $token = bin2hex(random_bytes(16));
                                $token_hash = hash_hmac('sha256',$token,'nayem');


                                $student_id = $row['id'];
                                $expire_timestamp = time() + 60*60*24*30;
                                $expires_at = date('Y-m-d H:i:s', $expire_timestamp);

                                $query    = "INSERT INTO remember_login(token_hash, user_id, expires_at) 
                                            VALUES(:token_hash, :student_id, :expires_at)";
                                $stmt     = $db->prepare($query);

                                $stmt     -> bindValue(':token_hash',$token_hash,PDO::PARAM_STR);
                                $stmt     -> bindValue(':student_id',$student_id,PDO::PARAM_INT);
                                $stmt     -> bindValue(':expires_at',$expires_at,PDO::PARAM_STR);

                                $result   = $stmt->execute();

                                if ($result) {
                                    $_SESSION['student_id'] = $row['id'];
                                    setcookie('remember_me',$token,$expire_timestamp,'/');
                                    header("Location: student");
                                }
                                
                            }else{
                                $_SESSION['student_id'] = $row['id'];
                                header("Location: student");
                            }

                        }else{
                            $error[] = '<i class="fa fa-star"></i> ID or Password missmatched! <i class="fa fa-star"></i>';
                        }


                }else {
                    $error[] = '<i class="fa fa-star"></i> Student Not Found! <i class="fa fa-star"></i>';
                }

                
            }else{
                $error[] = '<i class="fa fa-star"></i> Student is not activated! <i class="fa fa-star"></i>';
            }

        }

    }

?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>::Student Login</title>
	<!-- Meta-Tags -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="utf-8">
	<link rel="icon" type="image/png" href="assets/images/icons/icon.ico"/>
	<link href="assets3/css/style.css" rel='stylesheet' type='text/css' />
    <link href="assets2/css/style.css" rel="stylesheet" type="text/css" />
    <link href="assets2/css/styleM.css" rel="stylesheet" type="text/css" />
    <link href="assets2/css/fontawesome-all.css" rel="stylesheet" />
    <link rel="stylesheet" href="assets/css/bootstrap.css">



	<script>
		addEventListener("load", function () {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>

	<link href="assets3/css/style.css" rel='stylesheet' type='text/css' />
	<!--// Stylesheets -->
	<!--online fonts-->
	<link href="//fonts.googleapis.com/css?family=Catamaran:100,200,300,400,500,600,700,800,900" rel="stylesheet">
	<!--//online fonts-->
        <style type="text/css">
        	/*body {
			    margin: 0;
			    padding: 0;
			    background: #404040;
			    min-height: 100vh;
			    background-size: cover;
			    font-family: 'Raleway', sans-serif;
			}*/

			.dropdown:hover>.dropdown-menu {
				  display: block;
				}

				.dropdown>.dropdown-toggle:active {
				  /*Without this, clicking will make it sticky*/
				    pointer-events: none;
				}


				.dropbtn {
				    background-color: #4CAF50;
				    color: white;
				    padding: 16px;
				    font-size: 16px;
				    border: none;
				}

				.dropdown {
				    position: relative;
				    display: inline-block;
				}



				.dropdown-content {
				    display: none;
				    position: absolute;
				    background-color: #f1f1f1;
				    min-width: 160px;
				    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
				    z-index: 1;
				}

				.dropdown-content a {
				    color: black;
				    padding: 12px 16px;
				    text-decoration: none;
				    display: block;
				}

				.dropdown-content a:hover {background-color: #ddd;}

				.dropdown:hover .dropdown-content {display: block;}

				.dropdown:hover .dropbtn {background-color: #3e8e41;}
    	</style>



</head>


<body>
<div class="navb">
	<nav class="fh5co-nav navbar navbar-default navbar-fixed-top" role="navigation">
		<div class="top-menu">
			<div class="container">
				<div class="row">
					<div class="col-xs-2">
						<div id="fh5co-logo"><a href="index.php" style="font-size: 30px">SAS<span>.</span></a></div>
					</div>
					<div class="col-xs-10 text-right menu-1">
						<ul >
							<li><a href="index.php">Home</a></li>
							<li><a href="notice.php">Notice</a></li>
							<!-- <li><a href="event.php">Event</a></li> -->
							<!-- <li><a href="student_forum.php">Student Forum</a></li> -->
							<li><a href="about.php">About</a></li>
							<li><a href="contact.php">Contact</a></li>
							<li class="btn-cta" style="margin-bottom: -30px">

								
						<div class="dropdown">
							<ul class="btn btn-cta dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							    <a href=""><span>LOGIN
				    			<i class="fas fa-chevron-circle-down"></i></span></a>

							</ul>
						<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
							<br>
							<a class="dropdown-item" href="adminLogin.php" 
							style="color: black; margin: 40px; box-shadow: 40px">Admin</a><br><br>
							
							<a class="dropdown-item" href="teacherLogin.php" 
							style="color: black; margin: 40px; box-shadow: 40px">Teacher</a><br><br>
							
						</div>

									
							</li>
						</ul>
					</div>
				</div>
				
			</div>
		</div>
	</nav>
</div>

<div style="padding: 20px;">
			<h1 style="margin-bottom: 0px;">Student Login</h1>
</div>
	
	<div class="w3ls-login box">

		<img src="assets3/images/logo.png" alt="logo_img" />
		<!-- form starts here -->
		<form action="" method="post">
			<div class="agile-field-txt">
				<input type="text" id="sid" name="sid" placeholder="student ID" required=""/>
			</div>
			<div class="agile-field-txt">
				<input type="password" name="password" placeholder="password" required="" id="myInput" />
				<div class="agile_label">
					<input id="remember_me" name="remember_me" type="checkbox" value="show password">
					<label class="check" for="remember_me">Remember me</label>
				</div>
			</div>
			<div class="w3ls-bot">
				<input type="submit" name="signin" id="signin" value="login">
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
			</div>
		</form>
	</div>
	<!-- //form ends here -->
	<!--copyright-->
	<div class="copy-wthree">
		<p>© 2018 All Rights Reserved |  
			Developed by <a href="http://neonlab.com/" target="_blank" style="color: #F95959;"><b>Neon Lab</b></a></p>
	</div>
	<!--//copyright-->
</body>

</html>