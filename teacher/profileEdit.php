     
		<?php include 'include/header.php'; ?>
<?php  
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update_profile'])) {

        $teacher_id    = $_POST['teacher_id'];
        $teacher_name  = $_POST['teacher_name'];
        $teacher_email = $_POST['teacher_email'];

        /*
        * Validation [Empty Check]
        */
        if ($teacher_name == '' || empty($teacher_name)) {
          $error[] = '<i class="fa fa-star"></i> Name Empty! <i class="fa fa-star"></i>';
        }
        if ($teacher_email == '' || empty($teacher_email)) {
          $error[] = '<i class="fa fa-star"></i> Email Empty! <i class="fa fa-star"></i>';
        }


        if (empty($error)) {
            $query      = "UPDATE teacher SET 
                                teacher_name       = :teacher_name,
                                teacher_email      = :teacher_email

                                 WHERE teacher_id   = :teacher_id ";
            $stmt       = $db->prepare($query);
            $stmt       -> bindValue(':teacher_name',$teacher_name,PDO::PARAM_STR);
            $stmt       -> bindValue(':teacher_email',$teacher_email,PDO::PARAM_STR);
            $stmt       -> bindValue(':teacher_id',$teacher_id,PDO::PARAM_STR);
            $result     = $stmt->execute();

            if ($result) {
                header('location: profile.php');
            }
        }

    }
?>


												
										<!--//content body start--->
	<div id="page-wrapper">
			<div class="container" style=" color: green;">
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

                                <input type="text" hidden name="teacher_id" value="<?php echo $row_teacher['teacher_id'] ?>">

                                <table class="table">
                                    <tr>
                                        <td>Name : </td>
                                        <td><input type="text" name="teacher_name" value="<?php echo $row_teacher['teacher_name'] ?>" class="form-control"></td>
                                    </tr>
                                    <tr>
                                        <td>Email : </td>
                                        <td><input type="text" name="teacher_email" value="<?php echo $row_teacher['teacher_email'] ?>" class="form-control"></td>
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

                            <?php if (empty($row_teacher['teacher_profile_picture'])): ?>
                                <img src="assets/images/teacher/default-avatar.png" alt="">
                            <?php endif ?>
                            <?php if (!empty($row_teacher['teacher_profile_picture'])): ?>
                                <img src="assets/images/teacher/<?php echo $row_teacher['teacher_profile_picture'] ?>" alt="" style="height: 150px; width: 150px;" class="mb-4">
                            <?php endif ?>

                </div>
                <div class="col-md-6"></div>
            </div>
		</div>											
													<!--//weather-charts-->
			
										


										<!--//content body end--->
									

										<!--//outer-wp-->
									</div>

		<?php include 'include/copyright.php'; ?> <!--//sideber --->
									 
								</div>
							</div>
				<!--//content-inner-->

		<?php include 'include/sideber.php'; ?> <!--//sideber --->
		<?php include 'include/footer.php'; ?> <!--//sideber --->

						