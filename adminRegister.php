<?php  

	/*
	* If someone press the SIGN UP button OR
	* If server request method is set to post & the name is signup.
	* Thess code will execute.
	*/
	if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['signup'])) {
		include 'db/db.php';

		/*
		* Input data from Form
		*/
		$name 			= $_POST['full_name'];
		$email 			= $_POST['email'];
		$password 		= $_POST['password'];
		$retype         = $_POST['retype'];



		/*
		* Validation [Empty Check]
		*/
		if ($name == '' || empty($name)) {
		  $error[] = '<i class="fa fa-star"></i> Name is required <i class="fa fa-star"></i>';
		}

		if ($email == '' || empty($email)) {
		  $error[] = '<i class="fa fa-star"></i> Email is required <i class="fa fa-star"></i>';
		}

		if ($password == '' || empty($password)) {
		  $error[] = '<i class="fa fa-star"></i> Password is required <i class="fa fa-star"></i>';
		}

		if ($password != $retype) {
		  $error[] = '<i class="fa fa-star"></i> Password Mismatch <i class="fa fa-star"></i>';
		}


		/*
		* If all the fields are not empty
		* then this block will execute.
		*/
		if (!empty($name) && !empty($email) && !empty($password)) {

			// Validation for Email
			if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
				$error[] = 'Invalid Email format.';
			}else{
				// Check if the email is already in database or not
	            $query_check_email 	  = "SELECT * FROM admin WHERE admin_email = :email";
		    	$stmt_check_email 	  = $db->prepare($query_check_email);
		        $stmt_check_email     -> bindValue(':email',$email,PDO::PARAM_STR);
		    	$result_check_email   = $stmt_check_email->execute();
		    	$fetch_check_email    = $stmt_check_email->fetch();

		    	if ($fetch_check_email) {
		    		$error[] = 'Email already exists';
		    	}else{
		    		// Validation for Password
					if (strlen($password) < 3) {
						$error[] = "Password must be at least six character";
				    }

				    if (!preg_match('/.*[a-z]+.*/i', $password)) {
			        	$error[] = 'Password needs at least one letter';
			      	}

			      	if (!preg_match('/.*\d+.*/i', $password)) {
		                $error[] = 'Password needs at least one number';
		            }
		    	}
			}


	      	// If there is no error then send an email
			if (empty($error)) {

				$token = bin2hex(random_bytes(16));
		    	$token_hash = hash_hmac('sha256',$token,'nayem');

				$to = $email;
				$subject = "SAS | Email Confirmation";
				$txt = "<a href='localhost/sas/email_confirmation.php?id=$token' style='height:80px;width:250px;background:#303030;color:white; padding: 30px;text-decoration:none;'>Confirm Email</a>";
				$headers = "Content-Type: text/html; charset=ISO-8859-1\r\n".
				"From: nayemcse111@gmail.com" . "\r\n" .
				"CC:   nayemcse111@gmail.com";

				$mail = mail($to,$subject,$txt,$headers);

				if (!$mail) {
					$error[] = "Your email is not existed. Please provide a working email.";
				}

				

		    	if (empty($error) && $mail) {

		    		$encrypted_password = password_hash($password,PASSWORD_DEFAULT); // Best encryption function

					$query 	  = "INSERT INTO admin(admin_name, admin_email, admin_password, admin_token) 
								VALUES(:name, :email, :password, :token_hash)";
			    	$stmt 	  = $db->prepare($query);

			        $stmt     -> bindValue(':name',$name,PDO::PARAM_STR);
			        $stmt     -> bindValue(':email',$email,PDO::PARAM_STR);
			        $stmt     -> bindValue(':password',$encrypted_password,PDO::PARAM_STR);
			        $stmt     -> bindValue(':token_hash',$token_hash,PDO::PARAM_STR);

			    	$result   = $stmt->execute();

			    	if ($result) {
			    		$success[] = "Your account has been created successfully. <br> Please check your email & confirm to access your account.";
			    	}else{
			    		$error[] = 'Query execution error.';
			    	}
		    		
		    	}else{
		    		
		    	}
			}


		}

	}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title> :: Admin Register</title>

     <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
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

h1, .h1, h2, .h2, h3, .h3 {
                    margin-top: -5px;
                    margin-bottom: -29px;
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
							<li><a href="about.php">About</a></li>
							<li><a href="contact.php">Contact</a></li>
							<li class="btn-cta" style="margin-bottom: -30px">

								
							<div class="dropdown">
							<ul class="btn btn-cta dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							    <a href="#"><span>LOGIN
				    			<i class="fas fa-chevron-circle-down"></i></span></a>

							</ul>
						<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
							<br>
							<a class="dropdown-item" href="adminLogin.php" style="color: black; margin: 40px; box-shadow: 40px">Admin</a><br><br>

							<a class="dropdown-item" href="#" style="color: black; margin: 40px; box-shadow: 40px">Teacher</a><br><br>
							
							<a class="dropdown-item" href="#" style="color: black; margin: 40px; box-shadow: 40px">Student</a><br><br>
							
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
        <h2 style="color: white">Admin Register</h2>
        <form action="" method="POST">

            <div class=" w3l-form-group">
                <label>Full Name:</label>
                <div class="group">
                    <i class="fas fa-user"></i>
                    <input type="text" class="form-control" placeholder="Name" required="required" class="form-control" id="full_name" name="full_name" placeholder="Full Name" autocomplete="off" value="<?php  
                                        if(isset($_POST['signup'])){
                                            echo $name;
                                        }
                                    ?>"/>
                </div>
            </div>

            <div class=" w3l-form-group">
                <label>Email:</label>
                <div class="group">
                    <i class="fa fa-envelope"></i>
                    <input type="text" id="email" name="email" class="form-control" placeholder="Email" required="required" autocomplete="off" value="<?php  
                                        if(isset($_POST['signup'])){
                                            echo $email;
                                        }
                                    ?>"/>
                </div>
            </div>
            <div class=" w3l-form-group">
                <label>Password:</label>
                <div class="group">
                    <i class="fas fa-unlock"></i>
                    <input type="password" id="password" name="password" class="form-control" placeholder="Password" required="required" />
                </div>
            </div>

            <div class=" w3l-form-group">
                <label>Confirm Password:</label>
                <div class="group">
                    <i class="fas fa-unlock"></i>
                    <input type="password" id="retype" name="retype" class="form-control" placeholder="Retype Password" required="required" />
                </div>
            </div>
            

            <button type="submit" id="signup" name="signup"><b><i class="fa fa-paper-plane"></i> REGISTER<b></button>

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
        <p class=" w3l-register-p">Already have an account?<a href="adminLogin.php" class="register"> Sign in</a></p>
    </div>

</div>

</body>

</html>



