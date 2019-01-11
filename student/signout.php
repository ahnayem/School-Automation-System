<?php  
	ob_start();
	session_start();


	if (isset($_COOKIE['remember_me'])) {

		include '../db/db.php';
		$cookie 			= $_COOKIE['remember_me'];
		$token_hash 		= hash_hmac('sha256',$cookie,'nayem');

		$query 				= "DELETE FROM remember_login WHERE token_hash = :token_hash";
		$stmt 				= $db->prepare($query);
  		$stmt     			-> bindValue(':token_hash',$token_hash, PDO::PARAM_STR);
		$result 			= $stmt->execute();

		if ($result) {
			setcookie('remember_me', '', time() - 3600);
			session_destroy();
			header('location: ../student_login.php');
		}
	}else{
		setcookie('remember_me', '', time() - 3600);
		session_destroy();
		header('location: ../student_login.php');
	}
	
?>