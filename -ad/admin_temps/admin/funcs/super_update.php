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

    array_pop($_POST);
    // var_dump($_POST);
    // return;

    $_id = $_SESSION['Account_id'];

    $where = [
        'id' => $_POST['id']
    ];

    $statement_pass = selectUpdate($con, $operation, $_POST, $where);
    if ($statement_pass) {
        $output = true;
    } else {
       echo mysqli_error($con);
       $error = 'Error Updating';
    }
}
$details = [
    'output1'             =>  $output,
    'error'               =>  $error
];

echo json_encode($details);
