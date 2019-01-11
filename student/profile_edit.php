<?php include 'include/header.php'; ?>

<?php  
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update_profile'])) {

        $id = $student_id;

        $old_password  = $_POST['opassword'];
        $password  = $_POST['password'];
        $retype_password = $_POST['rpassword'];

        /*
        * Validation [Empty Check]
        */
        if ($old_password == '' || empty($old_password)) {
          $error[] = '<i class="fa fa-star"></i>Old Password Field Empty! <i class="fa fa-star"></i>';
        }
        if ($password == '' || empty($password)) {
          $error[] = '<i class="fa fa-star"></i> Password Field Empty! <i class="fa fa-star"></i>';
        }
        if ($retype_password == '' || empty($retype_password)) {
          $error[] = '<i class="fa fa-star"></i>Retype Password Field Empty! <i class="fa fa-star"></i>';
        }

        if($password != $retype_password) {
          $error[] = '<i class="fa fa-star"></i> Password twich should be match! <i class="fa fa-star"></i>';
        }

        


        if (empty($error)) {

            $query      = "SELECT * FROM student WHERE id =:student_id";
            $stmt       = $db->prepare($query);
            $stmt       -> bindValue(':student_id',$id,PDO::PARAM_STR);
            $result     = $stmt->execute();
            $row     = $stmt->fetch();




            if(password_verify($old_password,$row['password'])){

                $encrypted_password= password_hash($password,PASSWORD_DEFAULT);

                $query      = "UPDATE student SET password = :password WHERE id = :student_id ";
                $stmt       = $db->prepare($query);
                $stmt       -> bindValue(':password',$encrypted_password,PDO::PARAM_STR);
                $stmt       -> bindValue(':student_id',$id,PDO::PARAM_STR);
                $result     = $stmt->execute();


                if ($result) {
                    $success[] = 'Password reset successfully';
                } else {
                    $error[] = '<i class="fa fa-star"></i>password do not changed!<i class="fa fa-star"></i>';
                }

            }  else {
                $error[] = '<i class="fa fa-star"></i>Your old password is wrong!<i class="fa fa-star"></i>';
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
                                                    Set a new password
                                                </div>

                                                <div class="panel-body">
                                                    <form action="" method="POST">

                                                        <table class="table">
                                                            <tr>
                                                                <td>Old Password : </td>
                                                                <td><input type="password" id="opassword" name="opassword"  class="form-control"></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Password : </td>
                                                                <td><input type="password" id="password" name="password"  class="form-control"></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Retype Password: </td>
                                                                <td><input type="password" id="rpassword" name="rpassword"  class="form-control"></td>
                                                            </tr>

                                                            <tr>
                                                                <td></td>
                                                                <td><button type="submit" name="update_profile" class="btn btn-info">Save</button>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </form>
                                                </div>
                                    
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mt-4">
                                        <div class="outer-w3-agile col-xl mr-xl-3">
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