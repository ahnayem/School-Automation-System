<?php include 'include/header.php'; ?>

    
</head>

<?php 
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {

        $value = $_POST['submit'];

        if($value=="student"){
            
            $query6   ="SELECT * from result_class_6";
            $stmt6    = $db->prepare($query6);
            $result6  = $stmt6->execute();

            if($result6){
                while($row6  =$stmt6->fetch()){
      
                    $name_one = array($row6['sub1'] , $row6['sub2'] , $row6['sub3'] , $row6['sub4'] , $row6['total']);

                    $string6  = implode(",", $name_one);

                    $id6 = $row6['id'];


                    $query   ="UPDATE student SET result_6='$string6' WHERE id='$id6'"; 
                    $stmt    = $db->prepare($query);
                    $result  = $stmt->execute();

                    if($result){
                    }else{
                        $error[] = 'Query execution error.';
                    }

                }
            }


            $query7   ="SELECT * from result_class_7";
            $stmt7    = $db->prepare($query7);
            $result7  = $stmt7->execute();

            if($result7){
                while($row7  =$stmt7->fetch()){
      
                    $name_one = array($row7['sub1'] , $row7['sub2'] , $row7['sub3'] , $row7['sub4'] , $row7['total']);

                    $string7  = implode(",", $name_one);

                    $id7 = $row7['id'];


                    $query   ="UPDATE student SET result_7='$string7' WHERE id='$id7'"; 
                    $stmt    = $db->prepare($query);
                    $result  = $stmt->execute();

                    if($result){
                    }else{
                        $error[] = 'Query execution error.';
                    }

                }
            }
            



            $query8   ="SELECT * from result_class_8";
            $stmt8    = $db->prepare($query8);
            $result8  = $stmt8->execute();

            if($result8){
                while($row8  =$stmt8->fetch()){
      
                    $name_one = array($row8['sub1'] , $row8['sub2'] , $row8['sub3'] , $row8['sub4'] , $row8['total']);

                    $string8  = implode(",", $name_one);

                    $id8 = $row8['id'];


                    $query   ="UPDATE student SET result_8='$string8' WHERE id='$id8'"; 
                    $stmt    = $db->prepare($query);
                    $result  = $stmt->execute();

                    if($result){
                        //echo " updated ".'<br>';
                    }else{
                        $error[] = 'Query execution error.';
                    }

                }
            }
            


            $query9   ="SELECT * from result_class_9";
            $stmt9    = $db->prepare($query9);
            $result9  = $stmt9->execute();

            if($result9){
                while($row9  =$stmt9->fetch()){
      
                    $name_one = array($row9['sub1'] , $row9['sub2'] , $row9['sub3'] , $row9['sub4'], $row9['sub4_practical'] , $row9['total']);

                    $string9  = implode(",", $name_one);


                    $id9 = $row9['id'];

                    $query   ="UPDATE student SET result_9='$string9' WHERE id='$id9'"; 
                    $stmt    = $db->prepare($query);
                    $result  = $stmt->execute();

                    if($result){
                    }else{
                        $error[] = 'Query execution error.';
                    }

                }
            }
            

        
            $query10   ="SELECT * from result_class_10";
            $stmt10    = $db->prepare($query10);
            $result10  = $stmt10->execute();

            if($result10){
                while($row10  =$stmt10->fetch()){
      
                    $name_one = array($row10['sub1'] , $row10['sub2'] , $row10['sub3'] , $row10['sub4'], $row10['sub4_practical'] , $row10['total']);

                    $string10  = implode(",", $name_one);

                    $id10 = $row10['id'];

                    $query   ="UPDATE student SET result_10='$string10' WHERE id='$id10'"; 
                    $stmt    = $db->prepare($query);
                    $result  = $stmt->execute();

                    if($result){
                        
                    }else{
                        $error[] = 'Query execution error.';
                    }

                }
            }
            
            if(empty($error)){
                $success[] = "Student Database Update Successfully.";
            }
        }

        if($value=="class"){

                $query6   ="SELECT * from result_class_6 WHERE status=1";
                $stmt6    = $db->prepare($query6);
                $result6  = $stmt6->execute();

                if($result6){
                    while($row6  =$stmt6->fetch()){
          

                        $id6 = $row6['id'];


                        $query   ="UPDATE student SET current_class=7 WHERE id='$id6'"; 
                        $stmt    = $db->prepare($query);
                        $result  = $stmt->execute();

                        if($result){
                        }else{
                            $error[] = 'Query execution error.';
                        }

                    }
                }


                $query7   ="SELECT * from result_class_7  WHERE status=1";
                $stmt7    = $db->prepare($query7);
                $result7  = $stmt7->execute();

                if($result7){
                    while($row7  =$stmt7->fetch()){
          
                        $id7 = $row7['id'];


                        $query   ="UPDATE student SET current_class=8 WHERE id='$id7'"; 
                        $stmt    = $db->prepare($query);
                        $result  = $stmt->execute();

                        if($result){
                        }else{
                            $error[] = 'Query execution error.';
                        }

                    }
                }
                



                $query8   ="SELECT * from result_class_8  WHERE status=1";
                $stmt8    = $db->prepare($query8);
                $result8  = $stmt8->execute();

                if($result8){
                    while($row8  =$stmt8->fetch()){
          

                        $id8 = $row8['id'];


                        $query   ="UPDATE student SET current_class=9 WHERE id='$id8'"; 
                        $stmt    = $db->prepare($query);
                        $result  = $stmt->execute();

                        if($result){
                            //echo " updated ".'<br>';
                        }else{
                            $error[] = 'Query execution error.';
                        }

                    }
                }
                


                $query9   ="SELECT * from result_class_9  WHERE status=1";
                $stmt9    = $db->prepare($query9);
                $result9  = $stmt9->execute();

                if($result9){
                    while($row9  =$stmt9->fetch()){


                        $id9 = $row9['id'];

                        $query   ="UPDATE student SET current_class=10 WHERE id='$id9'"; 
                        $stmt    = $db->prepare($query);
                        $result  = $stmt->execute();

                        if($result){
                        }else{
                            $error[] = 'Query execution error.';
                        }

                    }
                }
                

            
                $query10   ="SELECT * from result_class_10  WHERE status=1";
                $stmt10    = $db->prepare($query10);
                $result10  = $stmt10->execute();

                if($result10){
                    while($row10  =$stmt10->fetch()){

                        $id10 = $row10['id'];

                        $query   ="UPDATE student SET current_class=0 WHERE id='$id10'"; 
                        $stmt    = $db->prepare($query);
                        $result  = $stmt->execute();

                        if($result){
                            
                        }else{
                            $error[] = 'Query execution error.';
                        }

                    }
                }
                
                if(empty($error)){
                    $success[] = "Class Update Successfully.";
                }
        }

        if($value="assign"){
            include '../db/db_assign.php';

            for($i=6; $i<=10; $i++){

                $table = "class_".$i;

                $query   ="TRUNCATE TABLE $table";
                $stmt    = $db->prepare($query);
                $result  = $stmt->execute();

                if($result){
                    $success[] = "Assign Classes Reset Successfully.";
                }else{
                    $error[] = 'Query execution error.';
                }

            }

        }

    }
?> 

<body class="cbp-spmenu-push">

        <?php include 'include/topbar.php'; ?>


        <!-- main content start-->

        <div id="page-wrapper" style="height: -webkit-fill-available">
            <div class="main-content" style="color: green;padding: 20px;">
            <div class="main-page general">

                <div class="forms">
                    <h2 class="title1">UPDATE CATALOG</h2>
                        <div class="clearfix"> </div>

                    <div class="form-grids col-md-4 row widget-shadow" data-example-id="basic-forms" style="padding: 10px"> 
                        <div class="form-group" >
                            <div class="row" >
                                <div class="grid_box1" style="margin-bottom: 0em">
                                    <div class="col-md-12 grid_box1" style="padding: 10px">
                                        <button type="button" class="btn btn-success btn-block"data-toggle="modal" data-target="#studentModal">
                                            Update Student Status
                                         </button>

                                    </div>
                                    <div class="col-md-12 grid_box1" style="padding: 10px">
                                        <button type="button" class="btn btn-primary btn-block"data-toggle="modal" data-target="#classUpdate" >
                                            Promot Class Who passed
                                         </button>
                                    </div>
                                    <div class="col-md-12 grid_box1" style="padding: 10px">
                                        <button type="button" class="btn btn-warning btn-block"data-toggle="modal" data-target="#assignModal">
                                            Reset Class Assign Status
                                         </button>
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

                                </div>
                                

<!-- Modal for Update Result-->
<div class="modal fade" id="studentModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Update Result!!</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <p style="color: black;">Do you want to update student result database? If you sure about that then 'procced', Otherwise close this Popup.</p>
      </div>
      <div class="modal-footer">
        <form action="" method="post">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" name="submit" value="student" class="btn btn-primary">Procced</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Modal for Reset Class Assign-->
<div class="modal fade" id="classUpdate" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle" style="color: red;">Warning!!</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <p style="color: black;">Do you want to update student's class who passed? If you sure about that then 'procced', Otherwise close this Popup.</p>
      </div>
      <div class="modal-footer">
        <form action="" method="post">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" name="submit" value="class" class="btn btn-primary">Procced</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Modal for Reset Class Assign-->
<div class="modal fade" id="assignModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle" style="color: red;">Warning!!</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <p style="color: black;">Do you want to Reset Class Assign? If you sure about that then 'procced', Otherwise close this Popup.</p>
      </div>
      <div class="modal-footer">
        <form action="" method="post">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" name="submit" value="assign" class="btn btn-primary">Procced</button>
        </form>
      </div>
    </div>
  </div>
</div>



                                <div class="clearfix"> </div>
                            </div>
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