<?php

include 'db.php';
session_start();
if (isset($_POST['save'])) {
    $subject = $_POST['Subject'];
    $description = $_POST['Description'];
    $unit = $_POST['Unit'];
    $semester = $_POST['Semester'];
    
    $re ="INSERT INTO subject (`SUBJ_CODE`, `SUBJ_DESCRIPTION`, `UNIT`, `PRE_REQUISITE`,COURSE_ID, `AY`, `SEMESTER`) 
     VALUES ('$subject', '$description','$unit','','7','','$semester')";


    $result = mysqli_query( $conn,$re );
    if(! $result )
        {
    echo "<script type=\"text/javascript\">
            alert(\"ERROR\");
            window.location = \"index.php\"
        </script>";

    } 
// echo "<script type=\"text/javascript\">
//          alert(\"Successfully Inserted.\");
//          window.location = \"index.php\"
//      </script>";
        $_SESSION['message'] = "Address saved"; 
		header('location: index.php');

}

//edit  
if (isset($_POST['update'])) {
	$id = $_POST['id'];
    $subject = $_POST['Subject'];
    $description = $_POST['Description'];
    $unit = $_POST['Unit'];
    $semester = $_POST['Semester'];

	mysqli_query($conn, "UPDATE subject SET SUBJ_CODE='$subject', SUBJ_DESCRIPTION='$description', UNIT ='$unit',SEMESTER='$semester'  WHERE SUBJ_ID=$id");
	$_SESSION['message'] = "Address updated!"; 
	header('location: index.php');
}

//delete
if (isset($_GET['del'])) {
	$id = $_GET['del'];
	mysqli_query($conn, "DELETE FROM subject WHERE SUBJ_ID=$id");
	$_SESSION['message'] = "Address deleted!"; 
	header('location: index.php');
}
?> 
