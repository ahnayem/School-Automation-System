<?php include 'include/header.php'; ?>

<?php  
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['profile_picture'])) {

        /*
        * Input data from Form
        */
        $student_id                         = $_POST['id'];
        $tmp_student_image                  = $_FILES["image"]["tmp_name"];
        $student_image                      = $_FILES["image"]["name"];


        /*
        * Validation [Empty Check]
        */
        if ($student_id == '' || empty($student_id)) {
          $error[] = '<i class="fa fa-star"></i> teacher Not Found! <i class="fa fa-star"></i>';
        }
        if ($student_image == '' || empty($student_image)) {
          $error[] = '<i class="fa fa-star"></i> Select an Image First! <i class="fa fa-star"></i>';
        }

        if (empty($error)) {

                $target_dir  = "img/student/";
                $target_file = $target_dir . basename($student_image);
                $target_file = bin2hex(random_bytes(8));
                $target_file = hash_hmac('sha256', $target_file, 'sas');
                
                $uploadOk    = 1;

                $imageFileType  = pathinfo($target_file,PATHINFO_EXTENSION);
                $check          = getimagesize($tmp_student_image);

                if($check !== false) {
                    $uploadOk = 1;
                    if (file_exists($target_file)) {
                        $error[] =  "Sorry, file already exists.";
                        $uploadOk = 0;
                    }

                    if ($uploadOk == 0) {
                        $error[] = "Sorry, your file was not uploaded.";
                    
                    } else {
                        $uploadOk = 1;
                        $extension      = 'PNG';

                        $prod           = $target_file;
                        $newfilename    = $prod .".".$extension;

                        move_uploaded_file($tmp_student_image, $target_dir.$newfilename);


                        $query      = "UPDATE student SET profile_picture =:student_image WHERE id=:student_id";
                        $stmt       = $db->prepare($query);
                        $stmt       -> bindValue(':student_image',$newfilename,PDO::PARAM_STR);
                        $stmt       -> bindValue(':student_id',$student_id,PDO::PARAM_STR);
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

<?php  
?>

        <!--- Main content -->
        <div class="product-sales-area mg-tb-30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" >
                        <div class="product-sales-chart" style=" padding: 40px;">
                            <div class="portlet-title">
                                <div class="row">
                                    <div class="col-md-6 mt-4">
                                        <div class="outer-w3-agile col-xl mr-xl-3">
                                            <div class="panel panel-default">
                                                <div class="panel-heading">
                                                    Student Profile
                                                </div>

                                                <div class="panel-body">
                                                    <table class="table">
                                                        <tr>
                                                            <td>Name : </td>
                                                            <td><?php echo $row_student['name'] ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Email : </td>
                                                            <td><?php echo $row_student['email'] ?></td>
                                                        </tr>

                                                        <tr>
                                                            <td></td>
                                                            <td><a href="profile_edit.php" style="color: blue; text-align: right;">Reset Password</a></td>
                                                        </tr>


                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6 mt-4 text-center">
                                        <div class="outer-w3-agile col-xl mr-xl-3">
                                                <?php if (empty($row_student['profile_picture'])): ?>
                                                    <img src="../assets/images/default-avatar.jpg" alt="" style="height: 150px; width: 150px;" class="mb-4">
                                                <?php endif ?>
                                                <?php if (!empty($row_student['profile_picture'])): ?>
                                                    <img src="img/student/<?php echo $row_student['profile_picture'] ?>" alt="" style="height: 150px; width: 150px;" class="mb-4">
                                                <?php endif ?>

                                                <form action="" method="post" enctype="multipart/form-data">
                                                    <input type="text" hidden value="<?php echo $row_student['id'] ?>" name="id">

                                                    <input type="file" name="image" class="btn btn-danger text-center" style="display: inline">
                                                    <button type="submit" class="btn btn-info btn" name="profile_picture">Save</button>
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
                            </div>                            
                            <div id="extra-area-chart" style="height: 356px;"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--- Main content end-->

<?php include 'include/footer.php'; ?>