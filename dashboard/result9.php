<?php include 'include/header.php'; ?>
		
	</head> 

	<body class="cbp-spmenu-push">

		<?php include 'include/topbar.php'; ?>


		<!-- main content start-->

		<div id="page-wrapper" style="height: -webkit-fill-available">
			<div class="main-content" style="color: green;padding: 20px; margin: 5px">
			<div class="main-page general">
				<h2 class="title1">Result Process Class 9 </h2>
				<div class="panel-info widget-shadow" style="padding-right: 30px">
					<div class="panel-grids">
						<div class="bs-example widget-shadow" data-example-id="bordered-table" style="margin-top: 0px; "> 
                            <h4 style="padding: 10px">Mark Input Status:</h4>
                            <form action="generate_result2.php" method="post">
                            <table class="table table-bordered"> 
                                <thead> 
                                    <tr> 
                                        <th style="color: green">Class 6</th> 
                                        <th style="color: green">Sub1</th> 
                                        <th style="color: green">Sub2</th> 
                                        <th style="color: green">Sub3</th> 
                                        <th style="color: green">Sub4</th>
                                        <th style="color: green">Sub4(Pract.)</th> 
                                    </tr> 
                                </thead> 

                                <tbody> 
                                    <?php 
                                            $das    = 'mysql:host=localhost;dbname=assign';
                                            $con    = new PDO($das,'root','');

                                        $query1 ="SELECT * from result_process_status9";

                                        $stmt1    = $con->prepare($query1);
                                        $result1   = $stmt1->execute();

                                        $check=1;
                                        while($row1 = $stmt1->fetch()){
                                        ?>

<tr>
<th scope="row">Status</th> 
<td><?php if($row1['sub1']==1){echo '<p style="color:#9933ff">'."finished".'</p>';}
else{$check=0; echo '<p style="color:red">'."unfinised".'</p>';} ?></td>
<td><?php if($row1['sub2']==1){echo '<p style="color:#9933ff">'."finished".'</p>';}
else{$check=0; echo '<p style="color:red">'."unfinised".'</p>';} ?></td>
<td><?php if($row1['sub3']==1){echo '<p style="color:#9933ff">'."finished".'</p>';}
else{$check=0; echo '<p style="color:red">'."unfinised".'</p>';} ?></td>
<td><?php if($row1['sub4']==1){echo '<p style="color:#9933ff">'."finished".'</p>';}
else{$check=0; echo '<p style="color:red">'."unfinised".'</p>';} ?></td>
<td><?php if($row1['sub4_practical']==1){echo '<p style="color:#9933ff">'."finished".'</p>';}
else{$check=0; echo '<p style="color:red">'."unfinised".'</p>';} ?></td>
</tr>

                                        
                                    </tbody>
                                </table>

                            <button class="btn btn-default hvr-icon-spin col-5" type="submit" id="submit" name="submit" value="result_class_9" <?php if($check==0) {echo "disabled";} else{ $_SESSION['cls'] = 'result_class_9';} ?> >Generate Result</button>
       						 <?php } ?>
                                </form>

                            </div>
                            

					</div>
					<div class="col-md-6 panel-grids"></div>
								<div class="clearfix"> </div>

				</div>
			</div>
		</div>
											<div class="clearfix"> </div>

		</div>
		<!-- main content end-->


		<div class="footer">
		   <p>&copy; 2018 All Rights Reserved | Develop by <a href="https://neonlab.com/" target="_blank" style="color: #F95959">Neo Lab</a></p>
		   											<div class="clearfix"> </div>

		</div>
							
	<?php include 'include/footer.php'; ?> 

	
</body>

</html>