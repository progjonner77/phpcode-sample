<?php
include '../init.php';
extract($_POST);

$error= '';
$success = '';

$date = date("d-m-Y");
 
    $sql = "INSERT INTO withdraw (`id`, `user_id` ,`date`, `u_crypt`,`amount`) VALUES ('','".$_SESSION['Account_id']."','".$date."','".$crypto."','".$amount."')";

    if (!mysqli_query($conn, $sql)) {
    //    die('Error: ' . mysqli_error($conn));
        $error = 'DB Error';
    }else{
         $success = 1;
    }
 

$details = [
    'output1'             =>  $success,
    'error'               =>  $error
];
echo json_encode($details);
