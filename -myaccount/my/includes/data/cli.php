<?php
include '../init.php';
extract($_POST);

$error= '';
$success = '';


$sql = "UPDATE user SET  fund = '" . $fund . "' WHERE id = '".$id."';";

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
