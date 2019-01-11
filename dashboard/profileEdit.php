
		<?php include 'include/header.php'; ?>

<?php  
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update_profile'])) {

        $admin_id    = $_POST['admin_id'];
        $admin_name  = $_POST['admin_name'];
        $admin_email = $_POST['admin_email'];

        /*
        * Validation [Empty Check]
        */
        if ($admin_name == '' || empty($admin_name)) {
          $error[] = '<i class="fa fa-star"></i> Name Empty! <i class="fa fa-star"></i>';
        }
        if ($admin_email == '' || empty($admin_email)) {
          $error[] = '<i class="fa fa-star"></i> Email Empty! <i class="fa fa-star"></i>';
        }


        if (empty($error)) {
            $query      = "UPDATE admin SET 
                                admin_name       = :admin_name,
                                admin_email      = :admin_email

                                WHERE admin_id   = :admin_id
                            ";
            $stmt       = $db->prepare($query);
            $stmt       -> bindValue(':admin_name',$admin_name,PDO::PARAM_STR);
            $stmt       -> bindValue(':admin_email',$admin_email,PDO::PARAM_STR);
            $stmt       -> bindValue(':admin_id',$admin_id,PDO::PARAM_STR);
            $result     = $stmt->execute();

            if ($result) {
                header('location: profile.php');
            }
        }

    }
?>
		
	</head> 

	<body class="cbp-spmenu-push">

		<?php include 'include/topbar.php'; ?>


		<!-- main content start-->
		<div id="page-wrapper">
			<div class="container" style=" color: green;padding: 20px; margin: 20px">
				<h2> Profile Edit</h2>
			</div>

					<div class="row mt-4">
                <div class="col-md-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            User Information
                        </div>

                        <div class="panel-body">
                            <form action="" method="POST">

                                <input type="text" hidden name="admin_id" value="<?php echo $row_admin['admin_id'] ?>">

                                <table class="table">
                                    <tr>
                                        <td>Name : </td>
                                        <td><input type="text" name="admin_name" value="<?php echo $row_admin['admin_name'] ?>" class="form-control"></td>
                                    </tr>
                                    <tr>
                                        <td>Email : </td>
                                        <td><input type="text" name="admin_email" value="<?php echo $row_admin['admin_email'] ?>" class="form-control"></td>
                                    </tr>

                                    <tr>
                                        <td></td>
                                        <td><button type="submit" name="update_profile" class="btn btn-info">Save</button></td>
                                    </tr>
                                </table>

                            </form>
                                
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mt-4 text-center">

                            <?php if (empty($row_admin['admin_profile_picture'])): ?>
                                <img src="assets/images/admin/default-avatar.png" alt="">
                            <?php endif ?>
                            <?php if (!empty($row_admin['admin_profile_picture'])): ?>
                                <img src="assets/images/admin/<?php echo $row_admin['admin_profile_picture'] ?>" alt="" style="height: 150px; width: 150px;" class="mb-4">
                            <?php endif ?>

                </div>
                <div class="col-md-6"></div>
            </div>
		</div>



		<!-- main content end-->



		<?php include 'include/copyright.php'; ?> 


		
	</div>
	<?php include 'include/footer.php'; ?> 

	
</body>

</html>