<?php
include '../init.php';
extract($_POST);

$error= '';
$success = '';
 

$sql = "UPDATE request SET  status = '" . 1 . "', date = now() WHERE id = '".$id ."';";

if (!mysqli_query($conn, $sql)) {
    // echo 'Error: ' . mysqli_error($conn);
    $error = 'DB Error';
}else{
    $success = 1;
}


$details = [
    'output1'             =>  $success,
    'error'               =>  $error
];
echo json_encode($details);
