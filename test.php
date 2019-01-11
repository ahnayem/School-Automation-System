<?php 
	
			include 'db/db.php';

	$query      = "SELECT * FROM message";
    $stmt       = $db->prepare($query);
    $result     = $stmt->execute();

    echo $result;

 $c=0; while($row = $stmt->fetch()){
echo $row['name'];
echo $row['email'];
echo $row['subject'];
echo $row['message'];
echo $row['date'];
$c=1;

} 

echo "did not show ".$c;

 ?>