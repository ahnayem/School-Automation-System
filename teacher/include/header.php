<?php  
    ob_start();
    session_start();
    session_regenerate_id();

    include '../db/db.php';

    if (isset($_COOKIE['remember_me'])) {

        $cookie = $_COOKIE['remember_me'] ?? false;
        $token_hash = hash_hmac('sha256',$cookie,'nayem');

        $query              = "SELECT * FROM remember_login WHERE token_hash = :token_hash";
        $stmt               = $db->prepare($query);
        $stmt               -> bindValue(':token_hash',$token_hash, PDO::PARAM_STR);
        $result             = $stmt->execute();
        $row                = $stmt->fetch();

        if (strtotime($row['expires_at']) < time() && !empty($row['token_hash'])) {
            header('location: ../teacherLogin.php');
        }

        if (!isset($_SESSION['user_id']) && empty($row['token_hash'])) {
            header('location: ../teacherLogin.php');
        }


        $teacher_id            = $row['user_id'];

        $query_teacher              = "SELECT * FROM teacher WHERE teacher_id = :teacher_id";
        $stmt_teacher              = $db->prepare($query_teacher);
        $stmt_teacher               -> bindValue(':teacher_id',$teacher_id, PDO::PARAM_STR);
        $result_teacher             = $stmt_teacher->execute();
        $row_teacher                = $stmt_teacher->fetch();



    }else{
        if (!isset($_SESSION['teacher_id'])) {
            header('location: ../teacherLogin.php');
        }


    }

?>


<?php  
    $teacher_id = $_SESSION['teacher_id'];

    $query_teacher              = "SELECT * FROM teacher WHERE teacher_id = :teacher_id";
    $stmt_teacher               = $db->prepare($query_teacher);
    $stmt_teacher              -> bindValue(':teacher_id',$teacher_id, PDO::PARAM_STR);
    $result_teacher             = $stmt_teacher->execute();
    $row_teacher               = $stmt_teacher->fetch();
?>
<!DOCTYPE HTML>
<html>
<head>
<title> :: Teacher pannel</title>
		
<link rel="icon" type="image/png" href="assets/images/icon/icon.ico"/>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
 <!-- Bootstrap Core CSS -->
<link href="assets/css/bootstrap.min.css" rel='stylesheet' type='text/css' />
<!-- Custom CSS -->
<link href="assets/css/style.css" rel='stylesheet' type='text/css' />
<!-- Graph CSS -->
<link href="assets/css/font-awesome.css" rel="stylesheet"> 
<!-- jQuery -->
<link href='//fonts.googleapis.com/css?family=Roboto:700,500,300,100italic,100,400' rel='stylesheet' type='text/css'>
<!-- lined-icons -->
<link rel="stylesheet" href="assets/css/icon-font.min.css" type='text/css' />
<!-- //lined-icons -->
<script src="assets/js/jquery-1.10.2.min.js"></script>
<script src="assets/js/amcharts.js"></script>	
<script src="assets/js/serial.js"></script>	
<script src="assets/js/light.js"></script>	
<script src="assets/js/radar.js"></script>	
<link href="assets/css/barChart.css" rel='stylesheet' type='text/css' />
<link href="assets/css/fabochart.css" rel='stylesheet' type='text/css' />
<!--clock init-->
<script src="assets/js/css3clock.js"></script>
<!--Easy Pie Chart-->
<!--skycons-icons-->
<script src="assets/js/skycons.js"></script>

<script src="assets/js/jquery.easydropdown.js"></script>

<!--//skycons-icons-->

<!--Calender-->
<link rel="stylesheet" href="assets/css/clndr.css" type="text/css" />
<script src="assets/js/underscore-min.js" type="text/javascript"></script>
<script src= "assets/js/moment-2.2.1.js" type="text/javascript"></script>
<script src="assets/js/clndr.js" type="text/javascript"></script>
<script src="assets/js/site.js" type="text/javascript"></script>

</head> 

<body>
   <div class="page-container">
   <!--/content-inner-->
	<div class="left-content">
	   <div class="inner-content">
		<!-- header-starts -->
			<div class="header-section">
						<!--menu-right-->
						<div class="top_menu">
						        
							<!--/profile_details-->
								<div class="profile_details_left">
									<ul class="nofitications-dropdown">
											
									       <li class="dropdown note">
											<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-envelope-o"></i> <span class="badge">3</span></a>

												
													<ul class="dropdown-menu two first">
														<li>
															<div class="notification_header">
																<h3>You have 3 new messages  </h3> 
															</div>
														</li>
														<li><a href="#">
														   <div class="user_img"><img src="assets/images/1.jpg" alt=""></div>
														   <div class="notification_desc">
															<p>Lorem ipsum dolor sit amet</p>
															<p><span>1 hour ago</span></p>
															</div>
														   <div class="clearfix"></div>	
														 </a></li>
														 <li class="odd"><a href="#">
															<div class="user_img"><img src="assets/images/in.jpg" alt=""></div>
														   <div class="notification_desc">
															<p>Lorem ipsum dolor sit amet </p>
															<p><span>1 hour ago</span></p>
															</div>
														  <div class="clearfix"></div>	
														 </a></li>
														<li><a href="#">
														   <div class="user_img"><img src="assets/images/in1.jpg" alt=""></div>
														   <div class="notification_desc">
															<p>Lorem ipsum dolor sit amet </p>
															<p><span>1 hour ago</span></p>
															</div>
														   <div class="clearfix"></div>	
														</a></li>
														<li>
															<div class="notification_bottom">
																<a href="#">See all messages</a>
															</div> 
														</li>
													</ul>
										</li>
										
								
						<li class="dropdown note">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-bell-o"></i> <span class="badge">5</span></a>

									<ul class="dropdown-menu two">
										<li>
											<div class="notification_header">
												<h3>You have 5 new notification</h3>
											</div>
										</li>
										<li><a href="#">
											<div class="user_img"><img src="assets/images/in.jpg" alt=""></div>
										   <div class="notification_desc">
											<p>Lorem ipsum dolor sit amet</p>
											<p><span>1 hour ago</span></p>
											</div>
										  <div class="clearfix"></div>	
										 </a></li>
										 <li class="odd"><a href="#">
											<div class="user_img"><img src="assets/images/in5.jpg" alt=""></div>
										   <div class="notification_desc">
											<p>Lorem ipsum dolor sit amet </p>
											<p><span>1 hour ago</span></p>
											</div>
										   <div class="clearfix"></div>	
										 </a></li>
										 <li><a href="#">
											<div class="user_img"><img src="assets/images/in8.jpg" alt=""></div>
										   <div class="notification_desc">
											<p>Lorem ipsum dolor sit amet </p>
											<p><span>1 hour ago</span></p>
											</div>
										   <div class="clearfix"></div>	
										 </a></li>
										 <li>
											<div class="notification_bottom">
												<a href="#">See all notification</a>
											</div> 
										</li>
									</ul>
							</li>	   							   		
							<div class="clearfix"></div>	
								</ul>
							</div>
							<div class="clearfix"></div>	
							<!--//profile_details-->
						</div>
						<!--//menu-right-->
					<div class="clearfix"></div>
				</div>
					<!-- //header-ends -->


						<div class="outter-wp">
								<!--custom-widgets-->