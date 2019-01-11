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
            header('location: ../student_login.php');
        }

        if (!isset($_SESSION['user_id']) && empty($row['token_hash'])) {
            header('location: ../student_login.php');
        }


        $student_id            = $row['user_id'];

        $query_student              = "SELECT * FROM student WHERE id = :student_id";
        $stmt_student              = $db->prepare($query_student);
        $stmt_student               -> bindValue(':student_id',$student_id, PDO::PARAM_STR);
        $result_student             = $stmt_student->execute();
        $row_student               = $stmt_student->fetch();



    }else{
        if (!isset($_SESSION['student_id'])) {
            header('location: ../student_login.php');
        }


    }

?>


<?php  
    $student_id = $_SESSION['student_id'];

    $query_student              = "SELECT * FROM student WHERE id = :student_id";
    $stmt_student               = $db->prepare($query_student);
    $stmt_student              -> bindValue(':student_id',$student_id, PDO::PARAM_STR);
    $result_student             = $stmt_student->execute();
    $row_student               = $stmt_student->fetch();
?>

<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title> Student Pannel</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- favicon
        ============================================ -->
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">
    <!-- Google Fonts
        ============================================ -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700,900" rel="stylesheet">
    <!-- Bootstrap CSS
        ============================================ -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Bootstrap CSS
        ============================================ -->
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <!-- owl.carousel CSS
        ============================================ -->
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="css/owl.theme.css">
    <link rel="stylesheet" href="css/owl.transitions.css">
    <!-- animate CSS
        ============================================ -->
    <link rel="stylesheet" href="css/animate.css">
    <!-- normalize CSS
        ============================================ -->
    <link rel="stylesheet" href="css/normalize.css">
    <!-- meanmenu icon CSS
        ============================================ -->
    <link rel="stylesheet" href="css/meanmenu.min.css">
    <!-- main CSS
        ============================================ -->
    <link rel="stylesheet" href="css/main.css">
    <!-- educate icon CSS
        ============================================ -->
    <link rel="stylesheet" href="css/educate-custon-icon.css">
    <!-- morrisjs CSS
        ============================================ -->
    <link rel="stylesheet" href="css/morrisjs/morris.css">
    <!-- mCustomScrollbar CSS
        ============================================ -->
    <link rel="stylesheet" href="css/scrollbar/jquery.mCustomScrollbar.min.css">
    <!-- metisMenu CSS
        ============================================ -->
    <link rel="stylesheet" href="css/metisMenu/metisMenu.min.css">
    <link rel="stylesheet" href="css/metisMenu/metisMenu-vertical.css">
    <!-- calendar CSS
        ============================================ -->
    <link rel="stylesheet" href="css/calendar/fullcalendar.min.css">
    <link rel="stylesheet" href="css/calendar/fullcalendar.print.min.css">
    <!-- style CSS
        ============================================ -->
    <link rel="stylesheet" href="style.css">
    <!-- responsive CSS
        ============================================ -->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- modernizr JS
        ============================================ -->
    <script src="js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>
    <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->
    <!-- Start Left menu area -->
    <div class="left-sidebar-pro">
        <nav id="sidebar" class="">
            <div class="sidebar-header">
                <a href="index.html"><img class="main-logo" src="img/logo/logosn.png" alt="" />
                    <b>STUDENT</b></a>
                <strong><a href="index.html"><img src="img/logo/logosn.png" alt="" /></a></strong>
            </div>
            <div class="left-custom-menu-adp-wrap comment-scrollbar">
                <nav class="sidebar-nav left-sidebar-menu-pro">
                    <ul class="metismenu" id="menu1">
                        <br><br>
                        <li>
                            <a href="index.php"><span class="educate-icon educate-student icon-wrap"></span> <span class="mini-click-non">Academic Status</span></a>
                        </li>
                       
                        <li>
                            <a href="subject_list.php"><span class="educate-icon educate-library icon-wrap"></span> <span class="mini-click-non">Subject List</span></a>
                        </li>

                        <li>
                            <a href="payment.php"><span class="educate-icon educate-interface icon-wrap"></span> <span class="mini-click-non">Payment</span></a>
                        </li>


                        <li>
                            <a href="result_archive.php"><span class="educate-icon educate-data-table icon-wrap"></span> <span class="mini-click-non">Result Archive</span></a>
                        </li>

                    </ul>
                </nav>
            </div>
        </nav>
    </div>
    <!-- End Left menu area -->
    <!-- Start Welcome area -->
    <div class="all-content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="logo-pro">
                        <a href="index.html"><img class="main-logo" src="img/logo/logo.png" alt="" /></a>
                    </div>
                </div>
            </div>
        </div>

        <div class="header-advance-area">
            <div class="header-top-area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="header-top-wraper">
                                <div class="row">
                                    <div class="col-lg-1 col-md-0 col-sm-1 col-xs-12">
                                        <div class="menu-switcher-pro">
                                            <button type="button" id="sidebarCollapse" class="btn bar-button-pro header-drl-controller-btn btn-info navbar-btn">
                                                    <i class="educate-icon educate-nav"></i>
                                                </button>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-7 col-sm-6 col-xs-12">
                                    </div>

                                    <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                                        <div class="header-right-info">
                                            <ul class="nav navbar-nav mai-top-nav header-right-menu">
                                                <li class="nav-item">
                                                    <a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle">
                                                            <img src="img/student/<?php echo $row_student['profile_picture'] ?>" alt="" />
                                                            <span class="admin-name">
                                                                <?php echo $row_student['name']; ?>
                                                            </span>
                                                            <i class="fa fa-angle-down edu-icon edu-down-arrow"></i>
                                                        </a>
                                                    <ul role="menu" class="dropdown-header-top author-log dropdown-menu animated zoomIn">
                                                        <li><a href="profile.php"><span class="edu-icon edu-user-rounded author-log-ic"></span>My Profile</a>
                                                        </li>
                                                        <li><a href="signout.php"><span class="edu-icon edu-locked author-log-ic"></span>Log Out</a>
                                                        </li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
