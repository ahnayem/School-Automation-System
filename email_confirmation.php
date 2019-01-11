<?php  
	if (isset($_GET['id'])) {
		include 'db/db.php';

		$token = $_GET['id'];


        $token_hash = hash_hmac('sha256',$token,'nayem');


		$query 	  = "SELECT * FROM admin WHERE admin_token=:token";
    	$stmt 	  = $db->prepare($query);
        $stmt     -> bindValue(':token',$token_hash,PDO::PARAM_STR);
    	$result   = $stmt->execute();

    	if ($result) {
    	    		
    		$query 	  = "UPDATE admin SET admin_status=1 WHERE admin_token = :token";
	    	$stmt 	  = $db->prepare($query);
	        $stmt     -> bindValue(':token',$token_hash,PDO::PARAM_STR);
	    	$result   = $stmt->execute();

	    	if ($result) {
	    		$success[] = 'Your account is activated. Please <a href="adminLogin.php">Sign In</a> to access your account';
	    	}else{
	    		header('location:505.html');
	    	}

    	}else{
	    	$error[] = 'User Not Found!!!';
    	}
	}else{
		header('location:404.html');
	}
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Email Confirmation</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />

	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/font-awesome.min.css">

	<script src="assets/js/jquery.min.js" async></script>
	<script src="assets/js/bootstrap.min.js" async></script>

	<style>
		.alert{
			padding: 7px;
			margin-bottom: 5px;
		}
	</style>
</head>
<body>

	<div class="container">
			
		<?php if (!empty($error)): ?>

		<div class="row">
			<div class="col-md-4"></div>
			<div class="col-md-4" style="margin-top: 5vh;">
				<div class="panel panel-danger">
					<div class="panel-body" style="padding-bottom: 10px">
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
			</div>
			<div class="col-md-4"></div>
		</div>

		<?php endif ?>


		<?php if (!empty($success)): ?>

		<div class="row">
			<div class="col-md-4"></div>
			<div class="col-md-4" style="margin-top: 5vh;">
				<div class="panel panel-success">
					<div class="panel-body" style="padding-bottom: 10px">
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
			</div>
			<div class="col-md-4"></div>
		</div>

		<?php endif ?>

	</div>

	
</body>
</html>



