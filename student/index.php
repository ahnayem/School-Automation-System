<?php include 'include/header.php'; ?>

        <!--- Main content -->
        <div class="product-sales-area mg-tb-30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="product-sales-chart" style="padding-left: 100px; padding-top: 30px;">
                            <div class="portlet-title">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <div class="caption pro-sl-hd">
                                            <span class="caption-subject"><b>Academic Information</b></span>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <div class="actions graph-rp graph-rp-dl">
                                            <p>All info based on current Status</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <ul class="list-inline cus-product-sl-rp">

                                <?php 
                                    //fatch the information of student's

                                    include '../db/db.php';

                                    $query      = "SELECT * FROM student WHERE id = $student_id";
                                    $stmt       = $db->prepare($query);
                                    $result     = $stmt->execute();
                                    $row        = $stmt->fetch();

                                 ?>

                                <li>
                                    <h5><i class="fa fa-circle" style="color: #006EF0;"></i>ID: <?php echo $row['id']; ?></h5>
                                </li><br>

                                <li>
                                    <h5><i class="fa fa-circle" style="color: #61b12d;"></i>Name: <?php echo $row['name']; ?> </h5>
                                </li><br>

                                <li>
                                    <h5><i class="fa fa-circle" style="color: #933EC5;"></i>Father name: <?php echo $row['father_name']; ?></h5> 
                                </li><br>
                                
                                <li>
                                    <h5><i class="fa fa-circle" style="color: #cc33ff;"></i>Email: <?php echo $row['email']; ?></h5>
                                </li><br>

                                <li>
                                    <h5><i class="fa fa-circle" style="color: #009933;"></i>Mobile: <?php echo $row['mobile']; ?></h5>
                                </li><br>

                                <li>
                                    <h5><i class="fa fa-circle" style="color: red;"></i>Blood Group: <?php echo $row['blood_group']; ?></h5> 
                                </li><br>

                                <br><br>

                                <li>
                                    <h5><i class="fa fa-circle" style="color: #44b12d;"></i>Batch: <?php echo $row['batch']; ?></h5>
                                </li><br>

                                <li>
                                    <h5><i class="fa fa-circle" style="color: #3333ff;"></i>Class: <?php echo $row['current_class']; ?></h5>
                                </li><br>

                                <li>
                                    <h5><i class="fa fa-circle" style="color: #999966;"></i>Roll: <?php echo $row['current_roll']; ?></h5>
                                </li><br>

                                <li>
                                    <h5><i class="fa fa-circle" style="color: #00ccff;"></i>Group: <?php echo $row['student_group']; ?></h5>
                                </li><br>
                            </ul>
                            <div id="extra-area-chart" style="height: 356px;"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--- Main content end-->

<?php include 'include/footer.php'; ?>