

 <!--- header include --->
<?php include 'include/header.php'; ?>

<?php 

	if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
		include '../db/db.php';

		/*
		* Input data from Form
		*/
		$name 			= $_POST['full_name'];
		$mobile			= $_POST['mobile'];
		$email 			= $_POST['email'];
		$g 				= isset($_POST['gender']);
		$blood_group 	= $_POST['blood_group'];

		if($g==1){
			$gender = 'male';
		}else{
			$gender = 'female';
		}

		$password 		= $_POST['password'];
		$retype         = $_POST['retype'];



		/*
		* Validation [Empty Check]
		*/
		if ($name == '' || empty($name)) {
		  $error[] = '<i class="fa fa-star"></i> Name is required <i class="fa fa-star"></i>';
		}

		if ($mobile == '' || empty($mobile)) {
		  $error[] = '<i class="fa fa-star"></i> Mobile is required <i class="fa fa-star"></i>';
		}

		if ($email == '' || empty($email)) {
		  $error[] = '<i class="fa fa-star"></i> Email is required <i class="fa fa-star"></i>';
		}

		if (!isset($_POST['gender'])) {
		  $error[] = '<i class="fa fa-star"></i> Gender is required <i class="fa fa-star"></i>';
		}

		if ($blood_group == '' || empty($blood_group)) {
		  $error[] = '<i class="fa fa-star"></i> Blood group is required <i class="fa fa-star"></i>';
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
	            $query_check_email 	  = "SELECT * FROM stuff WHERE stuff_email = :email";
		    	$stmt_check_email 	  = $db->prepare($query_check_email);
		        $stmt_check_email     -> bindValue(':email',$email,PDO::PARAM_STR);
		    	$result_check_email   = $stmt_check_email->execute();
		    	$fetch_check_email    = $stmt_check_email->fetch();

		    	if ($fetch_check_email) {
		    		$error[] = 'Email already exists';
		    	}else{
		    		// Validation for Password
					if (strlen($password) < 3) {
						$error[] = "Password must be at least 4 character";
				    }

				    if (!preg_match('/.*[a-z]+.*/i', $password)) {
			        	$error[] = 'Password needs at least one letter';
			      	}

			      	if (!preg_match('/.*\d+.*/i', $password)) {
		                $error[] = 'Password needs at least one number';
		            }
		    	}
			}			

				// if there is no error then insert data to the database

		    	if (empty($error)) {

					$token = bin2hex(random_bytes(16));
		    		$token_hash = hash_hmac('sha256',$token,'nayem');
		    		$encrypted_password = password_hash($password,PASSWORD_DEFAULT); // Best encryption function

					$query 	  = "INSERT INTO stuff(stuff_name,mobile stuff_email, stuff_gender,blood_group, stuff_password, stuff_token) 
								VALUES(:name, :email, :gender, :password, :token_hash)";
			    	$stmt 	  = $db->prepare($query);

			        $stmt     -> bindValue(':name',$name,PDO::PARAM_STR);
			        $stmt     -> bindValue(':mobile',$mobile,PDO::PARAM_STR);
			        $stmt     -> bindValue(':email',$email,PDO::PARAM_STR);
			        $stmt     -> bindValue(':gender',$gender,PDO::PARAM_STR);
			        $stmt     -> bindValue(':blood_group',$blood_group,PDO::PARAM_STR);			        
			        $stmt     -> bindValue(':password',$encrypted_password,PDO::PARAM_STR);
			        $stmt     -> bindValue(':token_hash',$token_hash,PDO::PARAM_STR);

			    	$result   = $stmt->execute();

			    	if ($result) {
			    		$success[] = "Stuff added successfully.";
			    	}else{
			    		$error[] = 'Query execution error.';
			    	}
		    		
		    	}
			}


		}

?>
		
	</head> 

	<body class="cbp-spmenu-push">

		<?php include 'include/topbar.php'; ?>


		<!-- main content start-->
		<div id="page-wrapper">
			<div class="main-page signup-page">
				<h2 class="title1">Add Stuff</h2>
				<div class="sign-up-row widget-shadow">
					<h5>Personal Information :</h5>
				<form action="" method="post">
					<div class="sign-u">
								<input type="text" id="full_name" name="full_name" placeholder="Full Name" required="">
						<div class="clearfix"> </div>
					</div>

					<div class="sign-u">
								<input type="text" id="mobile" name="mobile" placeholder="Mobile" required="">
						<div class="clearfix"> </div>
					</div>
					<div class="sign-u">
								<input type="email" id="email" name="email" placeholder="Email Address" required="">
						<div class="clearfix"> </div>
					</div>
					<div class="sign-u">
						<div class="sign-up1">
							<h4>Gender* :</h4>
						</div>
						<div class="sign-up2">
							<label>
								<input type="radio" id="gender" name="gender" value="male" required="">
								Male
							</label>
							<label>
								<input type="radio" id="gender" name="gender" value="female" required="">
								Female
							</label>
						</div>
						<div class="clearfix"> </div>
					</div>
					<div class="sign-u">
								<input type="text" id="blood_group" name="blood_group" placeholder="Blood group" required="">
						<div class="clearfix"> </div>
					</div>
					<h6>Login Information :</h6>
					<div class="sign-u">
								<input type="password" id="password" name="password" placeholder="Password" required="">
						<div class="clearfix"> </div>
					</div>
					<div class="sign-u">
								<input type="password" id="retype" name="retype" placeholder="Confirm Password" required="">
						</div>
						<div class="clearfix"> </div>
					<div class="sub_home">
							<input type="submit" id="submit" name="submit" value="submit">
						<div class="clearfix"> </div>
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
		<!-- main content end-->



		<?php include 'include/copyright.php'; ?> 


		
	</div>
	<?php include 'include/footer.php'; ?> 

	
</body>

</html>