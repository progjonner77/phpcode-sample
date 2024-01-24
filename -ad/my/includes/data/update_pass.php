<?php
include '../init.php';
extract($_POST);

$error= '';
$success = '';


if($old  != getField('user', 'id', 1, 'pass')){
    $error = 'Incorrect Password'; 
}else{
    $sql = "UPDATE admin SET  pass = '" . $new . "' WHERE id = '".$_SESSION['Account_id']."';";
    if (!mysqli_query($conn, $sql)) {
       // die('Error: ' . mysqli_error($con));
        $error = 'DB Error';
    }else{
         $success = 1;
    }
    
}



$details = [
    'output1'             =>  $success,
    'error'               =>  $error
];
echo json_encode($details);
