     
		<?php include 'include/header.php'; ?>

<?php 

	if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
		include '../db/db.php';

		$class = $_POST['cls'];
		$sub = $_POST['sub'];


		$_SESSION['cls'] = $class;
		$_SESSION['su'] = $sub;

		$cls = 'class_'.$class;




		if($class == '0') {
			 $error[] = '<i class="fa fa-star"></i> Select class <i class="fa fa-star"></i>';
		}


		if($sub == '0') {
			$error[] = '<i class="fa fa-star"></i>  Select Subject <i class="fa fa-star"></i>';
		}

		//check this subject assign previously or not
		if(empty($error)) {
			
			include '../db/db_assign.php';

			$query1 	 = "SELECT $sub FROM $cls WHERE $sub = $teacher_id";
			$stmt1       = $con->prepare($query1);
			$result1     = $stmt1->execute();
			$row1        = $stmt1->fetch();



			if($row1){
				//$error[] = '<i class="fa fa-star"></i>  Subject found <i class="fa fa-star"></i>';
			} else{
				$error[] = '<i class="fa fa-star"></i>  This subject did not assign for you, sir! <i class="fa fa-star"></i>';
			}


			// if there no error
			if(empty($error)){			

							$_SESSION['cls'] = $class;
							$_SESSION['su'] = $sub;

	            			header('location: Input.php');				
					
			}
		}



	}


?>

<?php 

	if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['practical'])) {
		include '../db/db.php';

		$class = $_POST['cls'];
		$sub = $_POST['sub'];


		$_SESSION['cls'] = $class;
		$_SESSION['su'] = $sub;

		$cls = 'class_'.$class;


		if($class == '0') {
			 $errorP[] = '<i class="fa fa-star"></i> Select class <i class="fa fa-star"></i>';
		}


		if($sub == '0') {
			$errorP[] = '<i class="fa fa-star"></i>  Select Subject <i class="fa fa-star"></i>';
		}

		//check this subject assign previously or not
		if(empty($errorP)) {

			include '../db/db_assign.php';

			$query1 	 = "SELECT $sub FROM $cls WHERE $sub = $teacher_id";
			$stmt1       = $con->prepare($query1);
			$result1     = $stmt1->execute();
			$row1        = $stmt1->fetch();



			if($row1){
				//$error[] = '<i class="fa fa-star"></i>  Subject found <i class="fa fa-star"></i>';
			} else{
				$errorP[] = '<i class="fa fa-star"></i>  This subject did not assign for you, sir! <i class="fa fa-star"></i>';
			}

			$sub = $sub.'_practical';


			// if there no error
			if(empty($errorP)){			

							$_SESSION['cls'] = $class;
							$_SESSION['su'] = $sub;

	            			header('location: InputPractical.php');				
					
			}
		}



	}


?>


												
										<!--//content body start--->

<div class="outter-wp">
	<div class="col-md-6 graph-2">
			<div class="grid-1">
				<h3 class="inner-tittle two" style="margin-top: -1px;">Input mark </h3>
				<div class="form-body">
					<div data-example-id="simple-form-inline"> 
						<form class="form-inline" action="" method="POST"> 
							<div class="form-group"> 
								<select class="form-control" id="cls" name="cls" style="height: 48px">
										<option value="0">Select class</option>
								        <option value="6">6</option>
								        <option value="7">7</option>
								        <option value="8">8</option>
								        <option value="9">9</option>
								        <option value="10">10</option>
								</select>
							</div> 
							<div class="form-group">
								<select class="form-control" id="sub" name="sub" style="height: 48px">
										<option value="0">Select Subject</option>
								        <option value="sub1">sub1</option>
								        <option value="sub2">sub2</option>
								        <option value="sub3">sub3</option>
								        <option value="sub4">sub4</option>
								</select>								
							</div> 
							<button type="submit" id="submit" name="submit" class="btn btn-default">Get Table</button> 

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
		 <div class="clearfix"> </div>
	</div>
	<div class="col-md-6 graph-2">
			<div class="grid-1">
				<h3 class="inner-tittle two" style="margin-top: -1px;">Input practical mark </h3>
				<div class="form-body">
					<div data-example-id="simple-form-inline"> 
						<form class="form-inline" action="" method="POST"> 
							<div class="form-group"> 
								<select class="form-control" id="cls" name="cls" style="height: 48px">
										<option value="0">Select class</option>
								        <option value="9">9</option>
								        <option value="10">10</option>
								</select>
							</div> 
							<div class="form-group">
								<select class="form-control" id="sub" name="sub" style="height: 48px">
										<option value="0">Select Subject</option>
								        <option value="sub4">sub4</option>
								</select>								
							</div> 
							<button type="submit" id="practical" name="practical" class="btn btn-default">Get Table</button> 

							<?php if (!empty($errorP)): ?>

                                <div class="row">
                                    <div class="col-md-12" style="margin-top: 15px;">

                                                <?php  
                                                    foreach ($errorP as $key => $value) {
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
		 <div class="clearfix"> </div>
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

						