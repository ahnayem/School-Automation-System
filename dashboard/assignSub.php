
<?php include 'include/header.php'; ?>



<?php  

    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['assign'])) {

        $cl           = $_POST['class'];
        $sub1         = $_POST['sub1'];
        $sub2         = $_POST['sub2'];
        $sub3         = $_POST['sub3'];
        $sub4         = $_POST['sub4'];

        $cls          = 'class_' . $cl;

                


            include '../db/db_assign.php';




            $query      = "UPDATE $cls SET  sub1= :sub1,
                                            sub2= :sub2,
                                            sub3= :sub3,
                                            sub4= :sub4";


            $stmt       = $con->prepare($query);
            $stmt       -> bindValue(':sub1',$sub1,PDO::PARAM_STR);
            $stmt       -> bindValue(':sub2',$sub2,PDO::PARAM_STR);
            $stmt       -> bindValue(':sub3',$sub3,PDO::PARAM_STR);
            $stmt       -> bindValue(':sub4',$sub4,PDO::PARAM_STR);
            $result     = $stmt->execute();


            if ($result) {
                $success[] = "successfully.";


            }else{
                $error[] = '<i class="fa fa-star"></i> Assign failed! <i class="fa fa-star"></i>';
            }
                        
    }
?>


</head> 

	<body class="cbp-spmenu-push">

		<?php include 'include/topbar.php'; ?>


		<!-- main content start-->
		<div id="page-wrapper">
			<div class="main-content" style="color: green;padding: 20px;">
				<h2 style="margin-left: 30px;">Assign Subject</h2><br>

                <div class="container">
                    <div class="row">
                        <div class="col-md-4 grid_box1">

                            <div class="panel panel-default" style="padding:60px 30px 45px 30px">

                                <div class="pannel-body">
                                    
                            <form class="form-horizontal" action="" method="POST"> 
                                <div class="form-group"> 
                                    <label for="class" class="col-sm-2 control-label">Class</label> 
                                    <div class="col-sm-9"> 
                                    <input type="text" class="form-control" id="class" name="class" placeholder=""> 
                                    </div> 
                                </div> 
                                <h5 style="color: red">Input Teacher code*</h5>
                                <div class="form-group"> 
                                    <label for="sub1" class="col-sm-2 control-label">Sub1</label> 
                                    <div class="col-sm-9"> 
                                    <input type="text" class="form-control" id="sub1" name="sub1" placeholder=""> 
                                    </div> 
                                </div>

                                <div class="form-group"> 
                                    <label for="sub2" class="col-sm-2 control-label">Sub2</label> 
                                    <div class="col-sm-9"> 
                                    <input type="text" class="form-control" id="sub2" name="sub2" placeholder=""> 
                                    </div> 
                                </div>

                                <div class="form-group"> 
                                    <label for="sub3" class="col-sm-2 control-label">Sub3</label> 
                                    <div class="col-sm-9"> 
                                    <input type="text" class="form-control" id="sub3" name="sub3" placeholder=""> 
                                    </div> 
                                </div>
                                
                                <div class="form-group"> 
                                    <label for="sub4" class="col-sm-2 control-label">Sub4</label> 
                                    <div class="col-sm-9"> 
                                    <input type="text" class="form-control" id="sub4" name="sub4" placeholder=""> 
                                    </div> 
                                </div>
                                    
                                <div class="" align="center"> 
                                    <button type="submit" class="btn btn-default" id="assign" name="assign">Assign</button>
                                </div>


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

                            <div class="clearfix"> </div>
                       </div>

                        <div class="col-md-8">
                            <div class="tables" style="padding-right: 60px">
                            <div class="bs-example widget-shadow" data-example-id="bordered-table" style="margin-top: 0px; "> 
                                <h4>Assign Table:</h4>
                                <table class="table table-bordered"> 
                                    <thead> 
                                        <tr> 
                                            <th style="color: green">Class</th> 
                                            <th style="color: green">Sub1</th> 
                                            <th style="color: green">Sub2</th> 
                                            <th style="color: green">Sub3</th> 
                                            <th style="color: green">Sub4</th> 
                                        </tr> 
                                    </thead> 

                                    <tbody> 
                                        <?php 
                                                $das    = 'mysql:host=localhost;dbname=assign';
                                                $con    = new PDO($das,'root','');

                                            $query1 ="SELECT * from class_6";

                                            $stmt1    = $con->prepare($query1);
                                            $result1   = $stmt1->execute();

                                            $i=1;
                                            while($row1 = $stmt1->fetch()){
                                            ?>

                                            <tr>
                                                <th scope="row">Class 6</th> 
                                                <td><?php echo $row1['sub1']; ?></td>
                                                <td><?php echo $row1['sub2']; ?></td>
                                                <td><?php echo $row1['sub3']; ?></td>
                                                <td><?php echo $row1['sub4']; ?></td>
                                            </tr>

                                            <?php } ?>

                                        <?php 

                                            $query2 ="SELECT * from class_7";

                                            $stmt2    = $con->prepare($query2);
                                            $result2   = $stmt2->execute();

                                            $i=1;
                                            while($row2 = $stmt2->fetch()){
                                            ?>

                                            <tr>
                                                <th scope="row">Class 7</th> 
                                                <td><?php echo $row2['sub1']; ?></td>
                                                <td><?php echo $row2['sub2']; ?></td>
                                                <td><?php echo $row2['sub3']; ?></td>
                                                <td><?php echo $row2['sub4']; ?></td>
                                            </tr>

                                            <?php } ?> 

                                            <?php 

                                            $query3 ="SELECT * from class_8";

                                            $stmt3    = $con->prepare($query3);
                                            $result3   = $stmt3->execute();

                                            $i=1;
                                            while($row3 = $stmt3->fetch()){
                                            ?>

                                            <tr>
                                                <th scope="row">Class 8</th> 
                                                <td><?php echo $row3['sub1']; ?></td>
                                                <td><?php echo $row3['sub2']; ?></td>
                                                <td><?php echo $row3['sub3']; ?></td>
                                                <td><?php echo $row3['sub4']; ?></td>
                                            </tr>

                                            <?php } ?>

                                            <?php 

                                            $query4 ="SELECT * from class_9";

                                            $stmt4    = $con->prepare($query4);
                                            $result4   = $stmt4->execute();

                                            $i=1;
                                            while($row4 = $stmt4->fetch()){
                                            ?>

                                            <tr>
                                                <th scope="row">Class 9</th> 
                                                <td><?php echo $row4['sub1']; ?></td>
                                                <td><?php echo $row4['sub2']; ?></td>
                                                <td><?php echo $row4['sub3']; ?></td>
                                                <td><?php echo $row4['sub4']; ?></td>
                                            </tr>

                                            <?php } ?>

                                            <?php 

                                            $query5 ="SELECT * from class_10";

                                            $stmt5    = $con->prepare($query5);
                                            $result5   = $stmt5->execute();

                                            $i=1;
                                            while($row5 = $stmt5->fetch()){
                                            ?>

                                            <tr>
                                                <th scope="row">Class 10</th> 
                                                <td><?php echo $row5['sub1']; ?></td>
                                                <td><?php echo $row5['sub2']; ?></td>
                                                <td><?php echo $row5['sub3']; ?></td>
                                                <td><?php echo $row5['sub4']; ?></td>
                                            </tr>

                                            <?php } ?>
                                        </tbody> 
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"> </div>
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