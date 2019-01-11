
		<?php include 'include/header.php'; ?>
<?php  
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['profile_picture'])) {

        /*
        * Input data from Form
        */
        $admin_id                         = $_POST['admin_id'];
        $tmp_admin_image                  = $_FILES["image"]["tmp_name"];
        $admin_image                      = $_FILES["image"]["name"];


        /*
        * Validation [Empty Check]
        */
        if ($admin_id == '' || empty($admin_id)) {
          $error[] = '<i class="fa fa-star"></i> admin Not Found! <i class="fa fa-star"></i>';
        }
        if ($admin_image == '' || empty($admin_image)) {
          $error[] = '<i class="fa fa-star"></i> Select an Image First! <i class="fa fa-star"></i>';
        }

        if (empty($error)) {

                $target_dir  = "assets/images/admin/";
                $target_file = $target_dir . basename($admin_image);
                $target_file = bin2hex(random_bytes(8));
                $target_file = hash_hmac('sha256', $target_file, 'sas');
                
                $uploadOk    = 1;

                $imageFileType  = pathinfo($target_file,PATHINFO_EXTENSION);
                $check          = getimagesize($tmp_admin_image);

                if($check !== false) {
                    $uploadOk = 1;
                    if (file_exists($target_file)) {
                        echo "Sorry, file already exists.";
                        $uploadOk = 0;
                    }

                    if ($uploadOk == 0) {
                        echo "Sorry, your file was not uploaded.";
                    
                    } else {
                        $uploadOk = 1;
                        $extension      = 'PNG';

                        $prod           = $target_file;
                        $newfilename    = $prod .".".$extension;

                        move_uploaded_file($tmp_admin_image, $target_dir.$newfilename);

                        $query      = "UPDATE admin SET admin_profile_picture = :admin_image WHERE admin_id= :admin_id";
                        
                        $stmt       = $db->prepare($query);
                        $stmt       -> bindValue(':admin_image',$newfilename,PDO::PARAM_STR);
                        $stmt       -> bindValue(':admin_id',$admin_id,PDO::PARAM_STR);
                        $result     = $stmt->execute();

                        if ($result) {
                            header("location: profile.php");

                        }else{
                            $error[] = '<i class="fa fa-star"></i> Select an Image First! <i class="fa fa-star"></i>';
                        }
                        
                        
                    }
                } else {
                    echo "File is not an image.";
                    $uploadOk = 0;
                }

        }
    }
?>
		
	</head> 

	<body class="cbp-spmenu-push">

		<?php include 'include/topbar.php'; ?>


		<!-- main content start-->
		<div id="page-wrapper">
			<div class="container" style="color: green;padding: 20px; margin: 20px">
				<h2>Profile</h2>
			</div>

			<div class="container">
                <div class="row" style="min-height: 50vh;">
                    <div class="col-md-6 mt-4">
                        <div class="outer-w3-agile col-xl mr-xl-3">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    Admin Information
                                </div>

                                <div class="panel-body">
                                    <table class="table">
                                        <tr>
                                            <td>Name : </td>
                                            <td><?php echo $row_admin['admin_name'] ?></td>
                                        </tr>
                                        <tr>
                                            <td>Email : </td>
                                            <td><?php echo $row_admin['admin_email'] ?></td>
                                        </tr>

                                        <tr>
                                            <td></td>
                                            <td><a href="profileEdit.php" style="color: blue; text-align: right;">Edit Profile Info</a></td>
                                        </tr>


                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-6 mt-4 text-center">
                        <div class="outer-w3-agile col-xl mr-xl-3">

                                <?php if (empty($row_admin['admin_profile_picture'])): ?>
                                    <img src="assets/images/admin/default-avatar.png" alt="">
                                <?php endif ?>
                                <?php if (!empty($row_admin['admin_profile_picture'])): ?>
                                    <img src="assets/images/admin/<?php echo $row_admin['admin_profile_picture'] ?>" alt="" style="height: 150px; width: 150px;" class="mb-4">
                                <?php endif ?>

                                <form action="" method="post" enctype="multipart/form-data">
                                    <input type="text" hidden value="<?php echo $row_admin['admin_id'] ?>" name="admin_id">

                                    <input type="file" name="image" class="btn btn-danger text-center" style="display: inline">
                                    <button type="submit" class="btn btn-info btn" name="profile_picture">Save</button>
                                </form>

                        </div>
                    </div>
                </div>
            </div>
		</div>

		
		<!-- main content end-->



		<?php include 'include/copyright.php'; ?> 


		
	</div>
	<?php include 'include/footer.php'; ?> 

	
</body>

</html>