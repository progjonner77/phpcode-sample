<?php

include '../../config/initiate.php';
 

$output["message"] = "";
$error = "";
$fields = "";
$values = "";

$missing = array();
foreach ($_POST as $key => $value) {

    if ($value == "") {
        array_push($missing, $key);
    }
}
if (count($missing) > 0) {
    $error = 1;
    $output["message"] =   "Please Fill all Fields";
} else {
    $_id = $_SESSION['Account_id'];

    $where = [
        'id' => $_id
    ];



    $statement_pass = selectUpdate($con, "account", $_POST, $where);
    if ($statement_pass) {
        $output["message"] = true;
    } else {
        $error = 1;
        $output["message"] = 'User Not Found';
    }
}
$details = [
    'output1'             =>  $output["message"],
    'error'               =>  $error
];
echo json_encode($details);
