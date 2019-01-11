<?php 

    // include 'db/db.php';
    $dns    = 'mysql:host=localhost;dbname=sas';
    $db     = new PDO($dns,'root','');

    

    $password ="nayem18";


    // $encrypted_password= password_hash("abc",PASSWORD_DEFAULT);


    // $query    = "INSERT INTO nayem(name) VALUES(:encrypted_password)";
    // $stmt           = $db->prepare($query);
    // $stmt       -> bindValue(':encrypted_password',$encrypted_password,PDO::PARAM_STR);
    // $result         = $stmt->execute();

    // if ($result) {
    //     echo "DONE";
    // }

    // $query    = "SELECT * FROM nayem where id=3";
    // $stmt           = $db->prepare($query);
    // $result         = $stmt->execute();
    // $row            = $stmt->fetch();

    // if (password_verify($password,$row['name'])) {
    //     $encrypted_password= password_hash("abc",PASSWORD_DEFAULT);
    //     $query      = "UPDATE nayem SET name =:encrypted_password WHERE id=3";
    //     $stmt       = $db->prepare($query);
    //     $stmt       -> bindValue(':encrypted_password',$encrypted_password,PDO::PARAM_STR);
    //     $result     = $stmt->execute();

    //     if($result){
    //         echo "update";
    //     }

    // }

    $student_id = 1805001;

    $query      = "SELECT * FROM student WHERE id =:student_id";
    $stmt       = $db->prepare($query);
    $stmt       -> bindValue(':student_id',$student_id,PDO::PARAM_STR);
    $result     = $stmt->execute();
    $row     = $stmt->fetch();




    if(password_verify($password,$row['password'])){
        $success[] = 'old password match';

    }  else {
        $error[] = '<i class="fa fa-star"></i>Your old password is wrong!<i class="fa fa-star"></i>';
    }

    // echo $row['password'];

    //$2y$10$ZmcFGBvzzswgVP3UtswSP.1Sw5bObqpraIMVF01DV6SS/wt2ohYl6

 ?>