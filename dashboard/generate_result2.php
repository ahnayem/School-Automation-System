<?php include 'include/header.php'; ?>

<?php 

	if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
		include '../db/db.php';



		//$cls = $_POST['submit'];

		$cls = $_SESSION['cls'];

		
		$query1 ="SELECT * from $cls";

	    $stmt1    = $db->prepare($query1);
	    $result1   = $stmt1->execute();


	    while($row1 = $stmt1->fetch()){

	    	$check=1;
			$q = "UPDATE $cls SET total=(sub1+sub2+sub3+sub4+sub4_practical) WHERE id={$row1['id']} ";
			$s    = $db->prepare($q);
	    	$r   = $s->execute();


				if($row1['sub1']<40){
					$check=0;
				} 

				if($row1['sub2']<40){
					$check=0;
				}

				if($row1['sub3']<40){
					$check=0;
				}

				if($row1['sub4']<40){
					$check=0;
				}

				$q_s = "UPDATE $cls SET status=$check WHERE id={$row1['id']}";
				$s_s    = $db->prepare($q_s);
		    	$r_s   = $s_s->execute();

		 	}

		 	//update roll
		 	$qu = "SELECT * FROM $cls WHERE status=1 GROUP by total DESC";
            $st    = $db->prepare($qu);
            $re   = $st->execute();

            

            $i=1;
            while($row2 = $st->fetch()){

	            $update_roll_query = "UPDATE $cls SET roll=$i WHERE id={$row2['id']}";
				$update_roll    = $db->prepare($update_roll_query);
		    	$up_roll   = $update_roll->execute();

		    	$update_main = "UPDATE student SET current_roll=$i WHERE id={$row2['id']}";
				$update_st    = $db->prepare($update_main);
		    	$update_re   = $update_st->execute();

		    	$i++;
	    	}

	    	//if fail someone then update roll with 0
		 	$qu = "SELECT * FROM $cls WHERE status=0 GROUP by total DESC";
            $st    = $db->prepare($qu);
            $re   = $st->execute();

         
            while($row2 = $st->fetch()){

	            $update_roll_query = "UPDATE $cls SET roll=0 WHERE id={$row2['id']}";
				$update_roll    = $db->prepare($update_roll_query);
		    	$up_roll   = $update_roll->execute();

		    	$update_main = "UPDATE student SET current_roll=0 WHERE id={$row2['id']}";
				$update_st    = $db->prepare($update_main);
		    	$update_re   = $update_st->execute();
		    	
	    	}	

		}

?>

	
		
	</head> 

	<body class="cbp-spmenu-push">

		<?php include 'include/topbar.php'; ?>


		<!-- main content start-->

		<div id="page-wrapper" style="height: -webkit-fill-available">
			<div class="main-content" >
			<div class="main-page general" id="HTMLtoPDF">
			<h2 class="title1" style="text-align: center; ">::Result Sheet::</h2>
				
				<div class="table-responsive bs-example widget-shadow" style="padding: 20px;">
						<table class="table table-bordered"> 
							<thead> 
								<tr> 
									<th>ID</th> 
									<th>Sub1</th> 
									<th>Sub2</th> 
									<th>Sub3</th> 
									<th>Sub4</th>
									<th>Sub4(Pr.)</th> 
									<th>Total</th> 
									<th>Roll</th> 
								</tr> 
							</thead> 
							<tbody> 

						<?php 
								include '../db/db.php';


                                $qu = "SELECT * FROM $cls WHERE status=1 GROUP by total DESC";

                                $st    = $db->prepare($qu);
                                $re   = $st->execute();

                                

                                $i=1;
                                while($r = $st->fetch()){
                         		?>

								<tr> 
									<th scope="row"><?php echo $r['id'] ?></th> 
									<td><?php echo $r['sub1']; ?></td> 
									<td><?php echo $r['sub2']; ?></td> 
									<td><?php echo $r['sub3']; ?></td> 
									<td><?php echo $r['sub4']; ?></td>
									<td><?php echo $r['sub4_practical']; ?></td> 
									<td><?php echo $r['total']; ?></td> 
									<td><?php echo $r['roll']; ?></td> 
								</tr> 

							<?php } ?>
							</tbody> 
						</table>

				<br><br><h3 style="color: red">Failed List </h3>

						<table class="table table-bordered"> 
							<thead> 
								<tr> 
									<th>ID</th> 
									<th>Sub1</th> 
									<th>Sub2</th> 
									<th>Sub3</th> 
									<th>Sub4</th>
									<th>Sub4(Pr.)</th> 
									<th>Total</th> 
									<th>Count</th> 
								</tr> 
							</thead> 
							<tbody> 

						<?php 
								include '../db/db.php';


                                $qu = "SELECT * FROM $cls WHERE status=0";

                                $st    = $db->prepare($qu);
                                $re   = $st->execute();

                                

                                $i=1;
                                while($r = $st->fetch()){
                         		?>

								<tr> 
									<th scope="row"><?php echo $r['id'] ?></th> 
									<td><?php echo $r['sub1']; ?></td> 
									<td><?php echo $r['sub2']; ?></td> 
									<td><?php echo $r['sub3']; ?></td> 
									<td><?php echo $r['sub4']; ?></td>
									<td><?php echo $r['sub4_practical']; ?></td> 
									<td><?php echo $r['total']; ?></td> 
									<td><?php echo $r['roll']; ?></td> 
								</tr> 

							<?php } ?>
							</tbody> 
						</table> 

						
					</div>

				</div>

					<br>
					<div class="sub_home">
							<button class="btn btn-default" onclick="HTMLtoPDF()">Download result</button>
							<a class="btn btn-warning" style="text-align: right;" href="index.php">GO HOME</a>
						<div class="clearfix"> </div>
					</div>
		</div>
											<div class="clearfix"> </div>

		</div>
		<!-- main content end-->


		<div class="footer">
		   <p>&copy; 2018 All Rights Reserved | Develop by <a href="https://neonlab.com/" target="_blank" style="color: #F95959">Neo Lab</a></p>
		   											<div class="clearfix"> </div>

		</div>

		<script src="assets/js/jspdf.js"></script>
	<script src="assets/js/jquery-2.1.3.js"></script>
	<script>
		function HTMLtoPDF(){
			var pdf = new jsPDF('p', 'pt', 'letter');
			source = $('#HTMLtoPDF')[0];
			specialElementHandlers = {
				'#bypassme': function(element, renderer){
					return true
				}
			}
			margins = {
			    top: 50,
			    left: 80,
			    width: 545
			  };
			pdf.fromHTML(
			  	source // HTML string or DOM elem ref.
			  	, margins.left // x coord
			  	, margins.top // y coord
			  	, {
			  		'width': margins.width // max width of content on PDF
			  		, 'elementHandlers': specialElementHandlers
			  	},
			  	function (dispose) {
			  	  // dispose: object with X, Y of the last line add to the PDF
			  	  //          this allow the insertion of new lines after html
			        pdf.save('<?php echo $cls; ?>');
			      }
			  )		
			}
	</script>
							
	<?php include 'include/footer.php'; ?> 



	
</body>

</html>