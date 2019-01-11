<?php include 'include/header.php'; ?>

        <!--- Main content -->
        <div class="product-sales-area mg-tb-30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" >
                        <div class="product-sales-chart" style=" padding: 40px;">
                            <div class="portlet-title">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="sparkline8-list">
                                            <div class="sparkline8-hd">
                                                <div class="main-sparkline8-hd">
                                                    <h1>Previous Result</h1>
                                                </div>
                                            </div>

                                            <br>
                                            <div class="sparkline8-graph">
                                                <div class="static-table-list">
                                                    <table class="table">
                                                        <thead>
                                                            <tr>
                                                                <th>Class</th>
                                                                <th>Sub1</th>
                                                                <th>Sub2</th>
                                                                <th>Sub3</th>
                                                                <th>Sub4</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>

                                                                <th scope="row">6</th>

                                                            <?php 
                                                            $query6 ="SELECT result_6 FROM student WHERE id=:student_id AND result_6 IS NOT NULL";

                                                            $stmt6    = $db->prepare($query6);
                                                            $stmt6 -> bindValue(':student_id',$student_id, PDO::PARAM_STR);
                                                            $result6   = $stmt6->execute();
                                                            $result6  =  $stmt6->fetch();
                                                            
                                                            if($result6){
                                                                
                                                                $array6 = explode(",", $result6[0]);
                                                            ?>

                                                                <td><?php echo $array6[0]; ?></td>
                                                                <td><?php echo $array6[1]; ?></td>
                                                                <td><?php echo $array6[2]; ?></td>
                                                                <td><?php echo $array6[3]; ?></td>
                                                            </tr>

                                                        <?php } ?>

                                                            <tr>

                                                                <th scope="row">7</th>

                                                            <?php 
                                                            $query7 ="SELECT result_7 FROM student WHERE id=:student_id AND result_7 IS NOT NULL";

                                                            $stmt7    = $db->prepare($query7);
                                                            $stmt7 -> bindValue(':student_id',$student_id, PDO::PARAM_STR);
                                                            $result7   = $stmt7->execute();
                                                            $result7  =  $stmt7->fetch();
                                                            
                                                            if($result7){
                                                                
                                                                $array7 = explode(",", $result7[0]);
                                                            ?>

                                                                <td><?php echo $array7[0]; ?></td>
                                                                <td><?php echo $array7[1]; ?></td>
                                                                <td><?php echo $array7[2]; ?></td>
                                                                <td><?php echo $array7[3]; ?></td>
                                                            </tr>

                                                        <?php } ?>

                                                            <tr>

                                                                <th scope="row">8</th>

                                                            <?php 
                                                            $query8 ="SELECT result_8 FROM student WHERE id=:student_id AND result_8 IS NOT NULL";

                                                            $stmt8    = $db->prepare($query8);
                                                            $stmt8 -> bindValue(':student_id',$student_id, PDO::PARAM_STR);
                                                            $result8   = $stmt8->execute();
                                                            $result8  =  $stmt8->fetch();
                                                            
                                                            if($result8){
                                                                
                                                                $array8 = explode(",", $result8[0]);
                                                            ?>

                                                                <td><?php echo $array8[0]; ?></td>
                                                                <td><?php echo $array8[1]; ?></td>
                                                                <td><?php echo $array8[2]; ?></td>
                                                                <td><?php echo $array8[3]; ?></td>
                                                            </tr>

                                                        <?php } ?>

                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>

                                            <br><br>

                                            <div class="sparkline8-graph">
                                                <div class="static-table-list">
                                                    <table class="table">
                                                        <thead>
                                                            <tr>
                                                                <th>Class</th>
                                                                <th>Sub1</th>
                                                                <th>Sub2</th>
                                                                <th>Sub3</th>
                                                                <th>Sub4</th>
                                                                <th>Sub4 (practical)</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>

                                                                <th scope="row">9</th>

                                                            <?php 
                                                            $query9 ="SELECT result_9 FROM student WHERE id=:student_id AND result_9 IS NOT NULL";

                                                            $stmt9    = $db->prepare($query9);
                                                            $stmt9 -> bindValue(':student_id',$student_id, PDO::PARAM_STR);
                                                            $result9   = $stmt9->execute();
                                                            $result9  =  $stmt9->fetch();
                                                            
                                                            if($result9){
                                                                
                                                                $array9 = explode(",", $result9[0]);
                                                            ?>

                                                                <td><?php echo $array9[0]; ?></td>
                                                                <td><?php echo $array9[1]; ?></td>
                                                                <td><?php echo $array9[2]; ?></td>
                                                                <td><?php echo $array9[3]; ?></td>
                                                                <td><?php echo $array9[4]; ?></td>
                                                            </tr>

                                                        <?php } ?>

                                                            <tr>

                                                                <th scope="row">10</th>

                                                            <?php 
                                                            $query10 ="SELECT result_10 FROM student WHERE id=:student_id AND result_10 IS NOT NULL";

                                                            $stmt10    = $db->prepare($query10);
                                                            $stmt10 -> bindValue(':student_id',$student_id, PDO::PARAM_STR);
                                                            $result10  = $stmt10->execute();
                                                            $result10  =  $stmt10->fetch();
                                                            
                                                            if($result10){
                                                                
                                                                $array10 = explode(",", $result10[0]);
                                                            ?>

                                                                <td><?php echo $array10[0]; ?></td>
                                                                <td><?php echo $array10[1]; ?></td>
                                                                <td><?php echo $array10[2]; ?></td>
                                                                <td><?php echo $array10[3]; ?></td>
                                                                <td><?php echo $array10[4]; ?></td>
                                                            </tr>

                                                        <?php } ?>

                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>                            
                            <div id="extra-area-chart" style="height: 356px;"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--- Main content end-->

<?php include 'include/footer.php'; ?>