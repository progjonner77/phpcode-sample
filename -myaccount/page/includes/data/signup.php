<?php
@include '../init.php';

extract($_POST);
$error= '';
$success = '';

if(!getField_count('user', 'email',  $email)){
    if(!getField_count('user', 'user_id',  $username)){
        $sql = "INSERT INTO user (`id`, `user_id` ,`email`, `name`,`phone`,`pass`) VALUES ('','".$username."','".$email."','".$name."','".$tel."','".$password."')";

        if (!mysqli_query($conn, $sql)) {
            die('Error: ' . mysqli_error($conn));
            $error = 'DB Error';
        }else{
            $success = 1;
        }
    }else{
        $error = "Username Not available";
    }
}else{
    $error = "Email Not available";
}

$details = [
'output1'             =>  $success,
'error'               =>  $error
];
echo json_encode($details);