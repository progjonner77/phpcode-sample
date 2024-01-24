<?php
include '../../config/initiate.php';


$error = "";
$output = "";

//var_dump($_POST);
$missing = array();
foreach ($_POST as $key => $value) {
    if ($value == "") {
        array_push($missing, $key);
    }
}
if (count($missing) > 0) {
    $error =  "Please Fill all Fields";
} else {

    //  echo 000;
    unset($missing);
    $_id = $_SESSION['Account_id'];
    $_User_Account_Name =  $_SESSION['Account_Name'];

    @$Reference = Track();

    $extra = [
        "name" => $_User_Account_Name,
        "reference" => $Reference,
        "date" => date("Y:m:d"),
        "user_id" => $_id,
        "remark" => "Please hold on while we review you request"
    ];


    if (justin($extra, 'deposit')) {
        $output = true;
    } else {
        $error ="There was an error depositing";
    }
}
$details = [
    'output1'             =>  $output,
    'error'               =>  $error
];

echo json_encode($details);
