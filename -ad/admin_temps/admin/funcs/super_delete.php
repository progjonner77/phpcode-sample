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

    $operation = $_POST['operation'];
    $field = "";
    $value = "";
    array_pop($_POST);

    foreach ($_POST as $key => $value) {
        $field = $key;
        $value = $value;
    }

    $result = deleteField($operation, $field, $value);
    $i = 0;
    if ($result) {
        $output =  true;
    } else {
        $error  = "Error in deletion";
    }
}
$details = [
    'output1'             =>  $output,
    'error'               =>  $error
];

echo json_encode($details);

