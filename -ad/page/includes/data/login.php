<?php
@include '../init.php';

extract($_POST);

$error= '';
$success = '';
$date = date("d-m-Y");

if(getField_count('user', 'email',  $email)){

    if(getField_count('user', 'pass',  $password)){
        $success = (getField_count('user', 'pass',  $password))?1:0;
        $_SESSION['Account_id'] = trim(getField( "user", "email", $email, "id"));
        $_SESSION['Account_Email'] = trim(getField( "user", "email", $email, "email"));
    }else{
        $error = "Wrong Email or password";
    }
}else{
$error = "Wrong Email or password";
}

$details = [
    'output1'             =>  $success,
    'error'               =>  $error
];
echo json_encode($details);
