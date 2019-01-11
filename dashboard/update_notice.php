<?php include 'include/header.php'; ?>

<?php 

	if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
		include '../db/db.php';

		/*
		* Input data from Form
		*/
		$title  	=  $_POST['title'];
		$describe   = $_POST['describe'];
        $tmp_file   = $_FILES["pdf_file"]["tmp_name"];
        $file       = $_FILES["pdf_file"]["name"];





		if ($title == '' || empty($title)) {
          $error[] = '<i class="fa fa-star"></i> Give a title <i class="fa fa-star"></i>';
        }
        // if ($describe == '' || empty($describe)) {
        //   $error[] = '<i class="fa fa-star"></i> Description needed <i class="fa fa-star"></i>';
        // }

        if(empty($error)){

        		$target_dir  = "../assets/file/pdf/";
                $target_file = basename($file,".pdf");

                

                $imageFileType  = pathinfo($target_file,PATHINFO_EXTENSION);

                    $uploadOk = 1;
                    if (file_exists($target_file)) {
                    	$error[] = '<i class="fa fa-star"></i> Sorry, file already exists. <i class="fa fa-star"></i>';
                        $uploadOk = 0;
                    }

                    if ($uploadOk == 0) {
                    	$error[] = '<i class="fa fa-star"></i> Sorry, your file was not uploaded. <i class="fa fa-star"></i>';                    
                    } else {
                        $uploadOk = 1;
                        $extension      = 'pdf';

                        $prod           = $target_file;
                        $newfilename    = $prod .".".$extension;

                        move_uploaded_file($tmp_file, $target_dir . $newfilename);


        			$query 	  = "INSERT INTO post(title, description, pdf_file_name) 
										VALUES(:title, :describe, :pdf_file_name)";
			    	$stmt 	  = $db->prepare($query);

			        $stmt     -> bindValue(':title',$title,PDO::PARAM_STR);
			        $stmt     -> bindValue(':describe',$describe,PDO::PARAM_STR);
			        $stmt     -> bindValue(':pdf_file_name',$newfilename,PDO::PARAM_STR);
			       
			    	$result   = $stmt->execute();

			    	if ($result) {
			    		$success[] = "Notice Upload successfully.";
			    	}else{
			    		$error[] = 'Query execution error.';
			    	}
			    }
			
        }


	}

?>
		
	</head> 

	<body class="cbp-spmenu-push">

		<?php include 'include/topbar.php'; ?>


		<!-- main content start-->

		<div id="page-wrapper" style="height: -webkit-fill-available">
			<div class="main-content" style="color: green;padding: 20px; margin: 5px">
			<div class="main-page general">

				<div class="forms">
				<h2 class="title1">Post Notice </h2>
					<div class="form-grids row widget-shadow" data-example-id="basic-forms"> 
						<div class="form-body">
							<form action="" method="post" enctype="multipart/form-data"> 
								<div class="form-group"> 
									<label for="title">Post Title</label> 
									<input type="text" class="form-control" id="title" name="title" placeholder="Title"> 
								</div> 
								<div class="form-group"> 
									<label for="describe">Post Description</label> 
									<textarea name="describe" id="describe" class="form-control" placeholder="Description" rows="7"></textarea> 
								</div>
								<div class="form-group"> 
									<label for="pdf">Upload File</label> 
									<input type="file" id="pdf" name="pdf_file" accept="application/pdf"> 
								</div> 

								<button type="submit" class="btn btn-default" id="submit" name="submit">Add Post</button>


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
							<div class="clearfix"> </div> 
						</div>
						<div class="clearfix"> </div>
					</div>
											<div class="clearfix"> </div>

				</div>
										<div class="clearfix"> </div>

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