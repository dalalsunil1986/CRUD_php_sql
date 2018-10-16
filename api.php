<?php
include 'db.php';


$sql="select * from subject"; 

$posts = array();

$array =  mysqli_query( $conn,$sql);


while($row = mysqli_fetch_array($array)){
    
    $a =$row['SUBJ_ID'];
	$b =$row['SUBJ_CODE'];
    $c =$row['SUBJ_DESCRIPTION'];
	$d =$row['UNIT'];
    $e =$row['SEMESTER'];

    $posts[] = array('a'=>$a,
    'b'=>$b);
}


echo stripslashes(json_encode($posts)); 


?>
