     
		<?php include 'include/header.php'; ?>

<?php

 ?>

												
										<!--//content body start--->

<div class="graph-visual tables-main">
			<h2 class="inner-tittle" style="color: green;">Courses:</h2>
				<div class="graph">
					<div class="tables">
																
						<table class="table table-bordered">
							<thead>
								<tr>
								  <th>#</th>
								  <th>Sub1</th>
								  <th>Sub2</th>
								  <th>sub3</th>
								  <th>sub4</th>
								</tr>
							</thead>
							<tbody>

								<?php 
									$dns = 'mysql:host=localhost;dbname=assign;charshet=utf8';
									$db  =  new PDO ($dns,'root','');


									

									$query ="SELECT * from class_6";

									$stmt 	  = $db->prepare($query);
									$result   = $stmt->execute();

									$i=1;
									while($row = $stmt->fetch()){
									?>

									<tr>
								  		<th scope="row">CLass 6</th>
							            <td style="text-align:center; color: red"><?php 

							            

							            if($row['sub1']==$teacher_id){

							            $queryS 	 = "SELECT sub1 FROM result_process_status6 WHERE sub1= 1";
										$stmtS       = $db->prepare($queryS);
										$resultS     = $stmtS->execute();
										$rowS = $stmtS->fetch();
										if($rowS){
											echo "(completed) ";
										}
							            	echo '<i class="glyphicon glyphicon-ok"></i>';
							            } ?></td>

							            <td style="text-align:center; color: red"><?php 


							            if($row['sub2']==$teacher_id){

							            $queryS 	 = "SELECT sub2 FROM result_process_status6 WHERE sub2= 1";
										$stmtS       = $db->prepare($queryS);
										$resultS     = $stmtS->execute();
										$rowS = $stmtS->fetch();
										if($rowS){
											echo "(completed) ";
										}

							            	echo '<i class="glyphicon glyphicon-ok"></i>';
							            } ?></td>

							            <td style="text-align:center; color: red"><?php 

							           
							            if($row['sub3']==$teacher_id){

							            $queryS 	 = "SELECT sub3 FROM result_process_status6 WHERE sub3= 1";
										$stmtS       = $db->prepare($queryS);
										$resultS     = $stmtS->execute();
										$rowS = $stmtS->fetch();
										if($rowS){
											echo "(completed) ";
										}
							            	echo '<i class="glyphicon glyphicon-ok"></i>';
							            } ?></td>

								        <td style="text-align:center; color: red"><?php 

								        if($row['sub4']==$teacher_id){

								        $queryS 	 = "SELECT sub4 FROM result_process_status6 WHERE sub4= 1";
										$stmtS       = $db->prepare($queryS);
										$resultS     = $stmtS->execute();
										$rowS = $stmtS->fetch();
										if($rowS){
											echo "(completed) ";
										}

								            	echo '<i class="glyphicon glyphicon-ok"></i>';
								            } ?></td>

							        </tr>

								<?php } ?>

								
								<?php 
									$dns = 'mysql:host=localhost;dbname=assign;charshet=utf8';
									$db  =  new PDO ($dns,'root','');

									$query ="SELECT * from class_7";

									$stmt 	  = $db->prepare($query);
									$result   = $stmt->execute();

									$i=1;
									while($row = $stmt->fetch()){
									?>

									<tr>
								  		<th scope="row">CLass 7</th>
							            <td style="text-align:center; color: red"><?php 

							            
							            if($row['sub1']==$teacher_id){

							            $queryS 	 = "SELECT sub1 FROM result_process_status7 WHERE sub1= 1";
										$stmtS       = $db->prepare($queryS);
										$resultS     = $stmtS->execute();
										$rowS = $stmtS->fetch();
										if($rowS){
											echo "(completed) ";
										}

							            	echo '<i class="glyphicon glyphicon-ok"></i>';
							            } ?></td>

							            <td style="text-align:center; color: red"><?php 

							           
							            if($row['sub2']==$teacher_id){

							             $queryS 	 = "SELECT sub2 FROM result_process_status7 WHERE sub2= 1";
										$stmtS       = $db->prepare($queryS);
										$resultS     = $stmtS->execute();
										$rowS = $stmtS->fetch();
										if($rowS){
											echo "(completed) ";
										}


							            	echo '<i class="glyphicon glyphicon-ok"></i>';
							            } ?></td>

							            <td style="text-align:center; color: red"><?php 

							            


							            if($row['sub3']==$teacher_id){

							            $queryS 	 = "SELECT sub3 FROM result_process_status7 WHERE sub3= 1";
										$stmtS       = $db->prepare($queryS);
										$resultS     = $stmtS->execute();
										$rowS = $stmtS->fetch();
										if($rowS){
											echo "(completed) ";
										}
							            	echo '<i class="glyphicon glyphicon-ok"></i>';
							            } ?></td>

							        <td style="text-align:center; color: red"><?php 

							        	
							        if($row['sub4']==$teacher_id){

							        $queryS 	 = "SELECT sub4 FROM result_process_status7 WHERE sub4= 1";
										$stmtS       = $db->prepare($queryS);
										$resultS     = $stmtS->execute();
										$rowS = $stmtS->fetch();
										if($rowS){
											echo "(completed) ";
										}

							            	echo '<i class="glyphicon glyphicon-ok"></i>';
							            } ?></td>
							        </tr>

								<?php } ?>


								
								<?php 
									$dns = 'mysql:host=localhost;dbname=assign;charshet=utf8';
									$db  =  new PDO ($dns,'root','');

									$query ="SELECT * from class_8";

									$stmt 	  = $db->prepare($query);
									$result   = $stmt->execute();

									$i=1;
									while($row = $stmt->fetch()){
									?>

									<tr>
								  		<th scope="row">CLass 8</th>
							            <td style="text-align:center; color: red"><?php 
							            

							            if($row['sub1']==$teacher_id){

							            $queryS 	 = "SELECT sub1 FROM result_process_status8 WHERE sub1= 1";
										$stmtS       = $db->prepare($queryS);
										$resultS     = $stmtS->execute();
										$rowS = $stmtS->fetch();
										if($rowS){
											echo "(completed) ";
										}

							            	echo '<i class="glyphicon glyphicon-ok"></i>';
							            } ?></td>

							            <td style="text-align:center; color: red"><?php 

							            
							            if($row['sub2']==$teacher_id){

							            $queryS 	 = "SELECT sub2 FROM result_process_status8 WHERE sub2= 1";
										$stmtS       = $db->prepare($queryS);
										$resultS     = $stmtS->execute();
										$rowS = $stmtS->fetch();
										if($rowS){
											echo "(completed) ";
										}

							            	echo '<i class="glyphicon glyphicon-ok"></i>';
							            } ?></td>

							            <td style="text-align:center; color: red"><?php 

							            
							            if($row['sub3']==$teacher_id){

							            $queryS 	 = "SELECT sub3 FROM result_process_status8 WHERE sub3= 1";
										$stmtS       = $db->prepare($queryS);
										$resultS     = $stmtS->execute();
										$rowS = $stmtS->fetch();
										if($rowS){
											echo "(completed) ";
										}

							            	echo '<i class="glyphicon glyphicon-ok"></i>';
							            } ?></td>

							        	<td style="text-align:center; color: red"><?php 

							        	if($row['sub4']==$teacher_id){

							        	$queryS 	 = "SELECT sub4 FROM result_process_status8 WHERE sub4= 1";
										$stmtS       = $db->prepare($queryS);
										$resultS     = $stmtS->execute();
										$rowS = $stmtS->fetch();
										if($rowS){
											echo "(completed) ";
										}

							            	echo '<i class="glyphicon glyphicon-ok"></i>';
							            } ?></td>
							        </tr>

								<?php } ?>

								
								<?php 
									$dns = 'mysql:host=localhost;dbname=assign;charshet=utf8';
									$db  =  new PDO ($dns,'root','');

									$query ="SELECT * from class_9";

									$stmt 	  = $db->prepare($query);
									$result   = $stmt->execute();

									$i=1;
									while($row = $stmt->fetch()){
									?>

									<tr>
								  		<th scope="row">CLass 9</th>
							            <td style="text-align:center; color: red"><?php 

							            
							            if($row['sub1']==$teacher_id){

							            $queryS 	 = "SELECT sub1 FROM result_process_status9 WHERE sub1= 1";
										$stmtS       = $db->prepare($queryS);
										$resultS     = $stmtS->execute();
										$rowS = $stmtS->fetch();
										if($rowS){
											echo "(completed) ";
										}

							            	echo '<i class="glyphicon glyphicon-ok"></i>';
							            } ?></td>

							            <td style="text-align:center; color: red"><?php 

							            
							            if($row['sub2']==$teacher_id){

							            $queryS 	 = "SELECT sub2 FROM result_process_status9 WHERE sub2= 1";
										$stmtS       = $db->prepare($queryS);
										$resultS     = $stmtS->execute();
										$rowS = $stmtS->fetch();
										if($rowS){
											echo "(completed) ";
										}
							            	echo '<i class="glyphicon glyphicon-ok"></i>';
							            } ?></td>

							            <td style="text-align:center; color: red"><?php 

							            
							            if($row['sub3']==$teacher_id){

							            $queryS 	 = "SELECT sub3 FROM result_process_status9 WHERE sub3= 1";
										$stmtS       = $db->prepare($queryS);
										$resultS     = $stmtS->execute();
										$rowS = $stmtS->fetch();
										if($rowS){
											echo "(completed) ";
										}
							            	echo '<i class="glyphicon glyphicon-ok"></i>';
							            } ?></td>

							       	    <td style="text-align:center; color: red"><?php 

							       	    
							       	    if($row['sub4']==$teacher_id){

							       	    $queryS 	 = "SELECT sub4 FROM result_process_status9 WHERE sub4= 1";
										$stmtS       = $db->prepare($queryS);
										$resultS     = $stmtS->execute();
										$rowS = $stmtS->fetch();
										if($rowS){
											echo "(completed) ";
										}
							            	echo '<i class="glyphicon glyphicon-ok"></i>';
							            } ?></td>
							        </tr>

								<?php } ?>


								
								<?php 
									$dns = 'mysql:host=localhost;dbname=assign;charshet=utf8';
									$db  =  new PDO ($dns,'root','');

									$query ="SELECT * from class_10";

									$stmt 	  = $db->prepare($query);
									$result   = $stmt->execute();

									$i=1;
									while($row = $stmt->fetch()){
									?>

									<tr>
								  		<th scope="row">CLass 10</th>
							            <td style="text-align:center; color: red"><?php 

							            if($row['sub1']==$teacher_id){

							            $queryS 	 = "SELECT sub1 FROM result_process_status10 WHERE sub1= 1";
										$stmtS       = $db->prepare($queryS);
										$resultS     = $stmtS->execute();
										$rowS = $stmtS->fetch();
										if($rowS){
											echo "(completed) ";
										}
							            	echo '<i class="glyphicon glyphicon-ok"></i>';
							            } ?></td>

							            <td style="text-align:center; color: red"><?php 

							            
							            if($row['sub2']==$teacher_id){

							            $queryS 	 = "SELECT sub2 FROM result_process_status10 WHERE sub2= 1";
										$stmtS       = $db->prepare($queryS);
										$resultS     = $stmtS->execute();
										$rowS = $stmtS->fetch();
										if($rowS){
											echo "(completed) ";
										}
							            	echo '<i class="glyphicon glyphicon-ok"></i>';
							            } ?></td>

							            <td style="text-align:center; color: red"><?php 

							            

							            if($row['sub3']==$teacher_id){

							            $queryS 	 = "SELECT sub3 FROM result_process_status10 WHERE sub3= 1";
										$stmtS       = $db->prepare($queryS);
										$resultS     = $stmtS->execute();
										$rowS = $stmtS->fetch();
										if($rowS){
											echo "(completed) ";
										}
							            	echo '<i class="glyphicon glyphicon-ok"></i>';
							            } ?></td>

								        <td style="text-align:center; color: red"><?php

								         
								        if($row['sub4']==$teacher_id){

								        $queryS 	 = "SELECT sub4 FROM result_process_status10 WHERE sub4= 1";
										$stmtS       = $db->prepare($queryS);
										$resultS     = $stmtS->execute();
										$rowS = $stmtS->fetch();
										if($rowS){
											echo "(completed) ";
										}
							            	echo '<i class="glyphicon glyphicon-ok"></i>';
							            } ?></td>
							        </tr>

								<?php } ?>
						</table>
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

						