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
            header('location: ../adminLogin.php');
        }

        if (!isset($_SESSION['user_id']) && empty($row['token_hash'])) {
            header('location: ../adminLogin.php');
        }


        $admin_id            = $row['user_id'];

        $query_admin              = "SELECT * FROM admin WHERE admin_id = :admin_id";
        $stmt_admin               = $db->prepare($query_admin);
        $stmt_admin               -> bindValue(':admin_id',$admin_id, PDO::PARAM_STR);
        $result_admin             = $stmt_admin->execute();
        $row_admin                = $stmt_admin->fetch();



    }else{
        if (!isset($_SESSION['admin_id'])) {
            header('location: ../adminLogin.php');
        }


    }

?>


<?php  
    $admin_id = $_SESSION['admin_id'];

    $query_admin              = "SELECT * FROM admin WHERE admin_id = :admin_id";
    $stmt_admin               = $db->prepare($query_admin);
    $stmt_admin               -> bindValue(':admin_id',$admin_id, PDO::PARAM_STR);
    $result_admin             = $stmt_admin->execute();
    $row_admin                = $stmt_admin->fetch();
?>
<!DOCTYPE HTML>
<html>
	<head>
		
		<title> Admin Pannel</title>
		<link rel="icon" type="image/png" href="assets/images/icon/icon.ico"/>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="keywords" content="" />
		<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>

		

		<!-- Bootstrap Core CSS -->
		<link href="assets/css/bootstrap.css" rel='stylesheet' type='text/css' />

		<!-- Custom CSS -->
		<link href="assets/css/style.css" rel='stylesheet' type='text/css' />

		<!-- font-awesome icons CSS -->
		<link href="assets/css/font-awesome.css" rel="stylesheet"> 
		<!-- //font-awesome icons CSS-->

		<!-- side nav css file -->
		<link href='assets/css/SidebarNav.min.css' media='all' rel='stylesheet' type='text/css'/>
		<!-- //side nav css file -->
		 
		 <!-- js-->
		<script src="assets/js/jquery-1.11.1.min.js"></script>
		<script src="assets/js/modernizr.custom.js"></script>

		<!--webfonts-->
		<link href="assets/css/googlefont.css" rel="stylesheet">
		<!--//webfonts--> 

		<!-- chart -->
		<script src="assets/js/Chart.js"></script>
		<!-- //chart -->

		<!-- Metis Menu -->
		<script src="assets/js/metisMenu.min.js"></script>
		<script src="assets/js/custom.js"></script>
		<link href="assets/css/custom.css" rel="stylesheet">
		<!--//Metis Menu -->
		<style>
		#chartdiv {
		  width: 100%;
		  height: 295px;
		}
		</style>
		<!--pie-chart --><!-- index page sales reviews visitors pie chart -->
		<script src="assets/js/pie-chart.js" type="text/javascript"></script>
		 <script type="text/javascript">

		        $(document).ready(function () {
		            $('#demo-pie-1').pieChart({
		                barColor: '#2dde98',
		                trackColor: '#eee',
		                lineCap: 'round',
		                lineWidth: 8,
		                onStep: function (from, to, percent) {
		                    $(this.element).find('.pie-value').text(Math.round(percent) + '%');
		                }
		            });

		            $('#demo-pie-2').pieChart({
		                barColor: '#8e43e7',
		                trackColor: '#eee',
		                lineCap: 'butt',
		                lineWidth: 8,
		                onStep: function (from, to, percent) {
		                    $(this.element).find('.pie-value').text(Math.round(percent) + '%');
		                }
		            });

		            $('#demo-pie-3').pieChart({
		                barColor: '#ffc168',
		                trackColor: '#eee',
		                lineCap: 'square',
		                lineWidth: 8,
		                onStep: function (from, to, percent) {
		                    $(this.element).find('.pie-value').text(Math.round(percent) + '%');
		                }
		            });

		           
		        });

		    </script>
		<!-- //pie-chart --><!-- index page sales reviews visitors pie chart -->

			<!-- requried-jsfiles-for owl -->
							<link href="assets/css/owl.carousel.css" rel="stylesheet">
							<script src="assets/js/owl.carousel.js"></script>
								<script>
									$(document).ready(function() {
										$("#owl-demo").owlCarousel({
											items : 3,
											lazyLoad : true,
											autoPlay : true,
											pagination : true,
											nav:true,
										});
									});
								</script>
							<!-- //requried-jsfiles-for owl -->


							<script src="assets/js/jquery-1.9.1.min.js"></script> 

	    <link rel="stylesheet" type="text/css" href="assets2/css/pignose.calendar.min.css" />

		<script>
        addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>

    <script src="assets3/js/jClocksGMT.js"></script>
<script src="assets3/js/jquery.rotate.js"></script>
<link rel="stylesheet" href="assets3/css/jClocksGMT.css">

<script>
            $(document).ready(function(){
                $('#clock_hou').jClocksGMT({offset: '-5', hour24: true});
                $('#clock_dc').jClocksGMT({offset: '-4', digital: false});
                $('#clock_BD').jClocksGMT({offset: '+6'});
            });
        </script>
							
