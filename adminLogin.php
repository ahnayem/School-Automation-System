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
            header('location: dashboard');
        }

        if (isset($_SESSION['admin_id'])) {
            header('location: dashboard');
        }
        
    }else{
        if (isset($_SESSION['admin_id'])) {
            header('location: dashboard');
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
        $email          = $_POST['email'];
        $password       = $_POST['password'];
        $remember_me    = isset($_POST['remember_me']);


        /*
        * Validation [Empty Check]
        */

        if ($email == '' || empty($email)) {
          $error[] = '<i class="fa fa-star"></i> Email is required <i class="fa fa-star"></i>';
        }

        if ($password == '' || empty($password)) {
          $error[] = '<i class="fa fa-star"></i> Password is required <i class="fa fa-star"></i>';
        }



        /*
        * If there is not error
        * then these code will execute
        */
        if (empty($error)) {

            $query_status           = "SELECT * FROM admin WHERE admin_email = :admin_email AND admin_status = 1";
            $stmt                   = $db->prepare($query_status);
            $stmt                   -> bindValue(':admin_email',$email,PDO::PARAM_STR);
            $result                 = $stmt->execute();
            $row                    = $stmt->fetch();

            /*
            * If email matched to the database 
            * and admin_status is 1
            * then these code will execute
            */
            if ($row) {
                $query_email    = "SELECT * FROM admin WHERE admin_email = '$email'";
                $stmt           = $db->prepare($query_email);
                $result         = $stmt->execute();
                $row            = $stmt->fetch();
                if ($row) {


                        if (password_verify($password,$row['admin_password'])) {


                            /*
                            * If someone press the Remember me checkbok
                            * then these code will execute
                            * otherwise only Session will set.
                            */
                            if (isset($_POST['remember_me'])) {

                                $token = bin2hex(random_bytes(16));
                                $token_hash = hash_hmac('sha256',$token,'nayem');


                                $admin_id = $row['admin_id'];
                                $expire_timestamp = time() + 60*60*24*30;
                                $expires_at = date('Y-m-d H:i:s', $expire_timestamp);

                                $query    = "INSERT INTO remember_login(token_hash, user_id, expires_at) 
                                            VALUES(:token_hash, :admin_id, :expires_at)";
                                $stmt     = $db->prepare($query);

                                $stmt     -> bindValue(':token_hash',$token_hash,PDO::PARAM_STR);
                                $stmt     -> bindValue(':admin_id',$admin_id,PDO::PARAM_INT);
                                $stmt     -> bindValue(':expires_at',$expires_at,PDO::PARAM_STR);

                                $result   = $stmt->execute();


                                if ($result) {
                                    $_SESSION['admin_id'] = $row['admin_id'];
                                    setcookie('remember_me',$token,$expire_timestamp,'/');
                                    header("Location: dashboard");
                                }
                                
                            }else{
                                $_SESSION['admin_id'] = $row['admin_id'];
                                header("Location: dashboard");
                            }

                        }else{
                            $error[] = '<i class="fa fa-star"></i> Email or Password missmatched! <i class="fa fa-star"></i>';
                        }


                }else {
                    $error[] = '<i class="fa fa-star"></i> admin Not Found! <i class="fa fa-star"></i>';
                }

                
            }else{
                $error[] = '<i class="fa fa-star"></i> admin is not activated! <i class="fa fa-star"></i>';
            }

        }

    }

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title> :: Admin Login</title>

    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" type="image/png" href="assets/images/icons/icon.ico"/>
    <link href="assets2/css/style.css" rel="stylesheet" type="text/css" />
    <link href="assets2/css/styleM.css" rel="stylesheet" type="text/css" />
    <link href="assets2/css/fontawesome-all.css" rel="stylesheet" />
    <link rel="stylesheet" href="assets/css/bootstrap.css">


    <link href="//fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

        <style type="text/css">
        	body {
			    margin: 0;
			    padding: 0;
			    background: #404040;
			    min-height: 100vh;
			    background-size: cover;
			    font-family: 'Raleway', sans-serif;
			}

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

	<div class="fh5co-loader"></div>

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
							<!-- <li><a href="event.php">Event</a></li>
                            <li><a href="student_forum.php">Student Forum</a></li> -->
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
							<a class="dropdown-item" href="teacherLogin.php" 
							style="color: black; margin: 40px; box-shadow: 40px">Teacher</a><br><br>
							
							<a class="dropdown-item" href="student_login.php" 
							style="color: black; margin: 40px; box-shadow: 40px">Student</a><br><br>
							
						</div>

									
							</li>
						</ul>
					</div>
				</div>
				
			</div>
		</div>
	</nav>
</div>

<div class="bod" style="padding-top: 90px">

    <div class=" w3l-login-form">
        <h2 style="color: #F95959">Admin Login</h2>
        <form action="" method="POST">

            <div class=" w3l-form-group">
                <label>Email:</label>
                <div class="group">
                    <i class="fa fa-envelope"></i>
                    <input type="text" id="email" name="email" class="form-control" placeholder="Email" required="required" value="<?php  
                                        if(isset($_POST['register'])){
                                            echo $email;
                                        }
                                    ?>"/>
                </div>
            </div>
            <div class=" w3l-form-group">
                <label>Password:</label>
                <div class="group">
                    <i class="fas fa-unlock"></i>
                    <input type="password" id="password" name="password" class="form-control pwd" placeholder="Password" required="required" />
                </div>
            </div>
            <div class="forgot">
                <p><input type="checkbox" id="remember_me" name="remember_me" style="position: absolute;">
                    <label for="remember_me" style="margin-left: 20px;">Remember me</label></p>                
                    <a href="forgot-password.php">Forgot Password?</a>
            </div>
            <button type="submit" name="signin" id="signin"><b><i class="fa fa-paper-plane"></i> SIGN IN<b></button>

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

        <p class=" w3l-register-p">Don't have an account?<a href="adminRegister.php" class="register"> Register</a></p>
    </div>

</div>

</body>

</html>