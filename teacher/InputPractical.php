     
<?php include 'include/header.php'; ?>

<?php 
		$class = $_SESSION['cls'];
		$sub = $_SESSION['su'];
 ?>


 <?php 

	if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {




		include '../db/db.php';




		$mark = $_POST['mark'];


			$class = $_SESSION['cls'];
			$sub = $_SESSION['su'];


		$cls = 'result_class_'.$class;

		
		$query 	 = "SELECT id FROM $cls";
		$stmt       = $db->prepare($query);
		$result     = $stmt->execute();


		$cn = count($mark);


$check=1;
		 for($i=0; $i<$cn; $i++) {
			$row = $stmt->fetch();

			$query1 	 = "UPDATE $cls SET $sub=$mark[$i] WHERE id={$row['id']} ";
			$stmt1       = $db->prepare($query1);
			$result1     = $stmt1->execute();

			if($result1){

			} else {
				$check=0;
			}
		}

		if ($check) {
					//for set the result input status     
		include '../db/db_assign.php'; 

	        $table = 'result_process_status'.$class;
			$queryS 	 = "UPDATE $table SET  $sub= 1";
			$stmtS       = $con->prepare($queryS);
			$resultS     = $stmtS->execute();

			$success[] = "Mark Input success!";
		} else {
			$error[] = '<i class="fa fa-star"></i> Oops! mark input failed <i class="fa fa-star"></i>';

		}


	}


?>




												
										<!--//content body start--->

<div class="outter-wp">




<div class="col-md-6 graph-2">
		<h3 class="inner-tittle two">Input mark </h3>
				<div class="grid-1">
					<div class="form-body">
						<div data-example-id="simple-form-inline"> 
							<form class="" action="" method="POST"> 
								<div class="form-group">
									
								
								<?php 
									include '../db/db.php';

										$query 	 = "SELECT id FROM student WHERE current_class = $class";
										$stmt      = $db->prepare($query);
										$result     = $stmt->execute();

										

										$i=1;
										while($row = $stmt->fetch()){
										?>

										<tr>
					<td><input type="text" name="id[]" value='<?php echo $row['id']; ?>' disabled size="6"></td>
								            <td ><input type="text" name="mark[]"></td>
								            <br>
								        </tr><br>


								<?php } ?>

								<button type="submit" id="submit" name="submit" class="btn btn-default">Input</button> 

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


	


										


										<!--//content body end--->
									

										<!--//outer-wp-->
									</div>

		<?php include 'include/copyright.php'; ?> <!--//sideber --->
									 
								</div>
							</div>
				<!--//content-inner-->

		<?php include 'include/sideber.php'; ?> <!--//sideber --->
		<?php include 'include/footer.php'; ?> <!--//sideber --->

						