     
        <?php include 'include/header.php'; ?>

<?php  
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['profile_picture'])) {

        /*
        * Input data from Form
        */
        $teacher_id                         = $_POST['teacher_id'];
        $tmp_teacher_image                  = $_FILES["image"]["tmp_name"];
        $teacher_image                      = $_FILES["image"]["name"];


        /*
        * Validation [Empty Check]
        */
        if ($teacher_id == '' || empty($teacher_id)) {
          $error[] = '<i class="fa fa-star"></i> teacher Not Found! <i class="fa fa-star"></i>';
        }
        if ($teacher_image == '' || empty($teacher_image)) {
          $error[] = '<i class="fa fa-star"></i> Select an Image First! <i class="fa fa-star"></i>';
        }

        if (empty($error)) {

                $target_dir  = "assets/images/teacher/";
                $target_file = $target_dir . basename($teacher_image);
                $target_file = bin2hex(random_bytes(8));
                $target_file = hash_hmac('sha256', $target_file, 'sas');
                
                $uploadOk    = 1;

                $imageFileType  = pathinfo($target_file,PATHINFO_EXTENSION);
                $check          = getimagesize($tmp_teacher_image);

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

                        move_uploaded_file($tmp_teacher_image, $target_dir.$newfilename);

                        $query      = "UPDATE teacher SET teacher_profile_picture = :teacher_image WHERE teacher_id= :teacher_id";
                        $stmt       = $db->prepare($query);
                        $stmt       -> bindValue(':teacher_image',$newfilename,PDO::PARAM_STR);
                        $stmt       -> bindValue(':teacher_id',$teacher_id,PDO::PARAM_STR);
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


                                                
                                        <!--//content body start--->
                                                
        <div id="page-wrapper">
            <div class="container" style="color: green;">
                <h2>Profile</h2>
            </div>

            <div class="container" style="padding-right: 150px;">
                <div class="row" style="min-height: 50vh;">
                    <div class="col-md-6 mt-4">
                        <div class="outer-w3-agile col-xl mr-xl-3">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    teacher Information
                                </div>

                                <div class="panel-body">
                                    <table class="table">
                                        <tr>
                                            <td>Name : </td>
                                            <td><?php echo $row_teacher['teacher_name'] ?></td>
                                        </tr>
                                        <tr>
                                            <td>Email : </td>
                                            <td><?php echo $row_teacher['teacher_email'] ?></td>
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

                                <?php if (empty($row_teacher['teacher_profile_picture'])): ?>
                                    <img src="assets/images/teacher/default-avatar.png" alt="">
                                <?php endif ?>
                                <?php if (!empty($row_teacher['teacher_profile_picture'])): ?>
                                    <img src="assets/images/teacher/<?php echo $row_teacher['teacher_profile_picture'] ?>" alt="" style="height: 150px; width: 150px;" class="mb-4">
                                <?php endif ?>

                                <form action="" method="post" enctype="multipart/form-data">
                                    <input type="text" hidden value="<?php echo $row_teacher['teacher_id'] ?>" name="teacher_id">

                                    <input type="file" name="image" class="btn btn-danger text-center" style="display: inline">
                                    <button type="submit" class="btn btn-info btn" name="profile_picture">Save</button>
                                </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>


                                        <!--//content body end--->
                                    

                                        <!--//outer-wp-->
                                    </div>

        <?php include 'include/copyright.php'; ?> <!--//sideber --->
                                     
                                </div>
                            </div>
                <!--//content-inner-->

        <?php include 'include/sideber.php'; ?> <!--//sideber --->
        <?php include 'include/footer.php'; ?> <!--//sideber --->

                        