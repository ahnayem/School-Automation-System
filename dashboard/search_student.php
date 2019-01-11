<?php include 'include/header.php'; ?>


	
	</head> 

	<body class="cbp-spmenu-push">

		<?php include 'include/topbar.php'; ?>


		<!-- main content start-->

		<div id="page-wrapper" style="height: -webkit-fill-available">
			<div class="main-content" style="color: green;padding: 20px;">
			<div class="main-page general">

				<div class="forms">
					<div><h2 class="title1">Search Student</h2><br></div>
					
						<div class="clearfix"> </div>
					<div class="row">
						<div class="col-md-4">
							<div class="panel panel-info">
							  	<div class="panel-heading"><h4>Input ID</h4></div>
							  	<div class="panel-body">
							  		<form action="" method="post">
										<div class="form-group">
										    <input type="text" class="form-control" id="id" name="id" placeholder="Student ID">
										</div>
										<button type="submit" id="submit" name="submit" class="btn btn-primary">Search</button>
									</form>
							  	</div>
							</div>
							
						</div>
<?php
	
	$check = 0;

	if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {

		$id = $_POST['id'];

		if($id == '' || empty($id)){
			echo '<script language="javascript">';
			echo 'alert("please give Student ID")';
			echo '</script>';
		}

		else{
			include '../db/db.php';

			$query      = "SELECT * FROM student WHERE id = $id";
            $stmt       = $db->prepare($query);
            $result     = $stmt->execute();
            $row        = $stmt->fetch();

	        $check = 1;			
		}


	}
?>
  						<div class="col-md-8">
  							<?php if($check == 1): ?>
  								
				  				<div class="panel panel-info">
					  				<div class="panel-heading"><h4>Details</h4></div>
							  		<div class="panel-body">

							  			<?php if($row==0) {echo 'Student not found!';}?>
							  			
							  			<?php if($row>0):?>
							  			
							  				<p>ID: <?php echo $row['id']; ?></p>
							  				<p>Name: <?php echo $row['name']; ?></p>
							  				<p>Father: <?php echo $row['father_name']; ?></p>
							  				<p>Batch: <?php echo $row['batch']; ?></p>
							  				<p>Current Class: <?php echo $row['current_class']; ?></p>
							  				<p>Current Roll: <?php echo $row['current_roll']; ?></p>
							  				<p>Group: <?php echo $row['student_group']; ?></p>
							  				<p>Mobile: <?php echo $row['mobile']; ?></p>
							  				<p>Email: <?php echo $row['email']; ?></p>
							  				<p>Gender: <?php echo $row['gender']; ?></p>
							  				<p>Blood Group: <?php echo $row['blood_group']; ?></p>
							  			<?php endif ?>
							  		</div>
								</div>

  							<?php endif ?>
  						</div>
					</div>	
					
				</div>
			</div>

		</div>
											

		</div>
		<!-- main content end-->


		<div class="footer">
		   <p>&copy; 2018 All Rights Reserved | Develop by <a href="https://neonlab.com/" target="_blank" style="color: #F95959">Neo Lab</a></p>
		   											<div class="clearfix"> </div>

		</div>
							
	<?php include 'include/footer.php'; ?> 

	
</body>

</html>