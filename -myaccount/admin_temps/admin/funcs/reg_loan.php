
<?php

include '../../config/initiate.php';
 

$output["message"] = "";
$error = '';
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

    unset($missing);
    $_id = $_SESSION['Account_id'];
    $_User_Account_Name =  $_SESSION['Account_Name'];
   

    $extra = [
        "User_Name" => $_User_Account_Name,
        "Date" => date("Y:m:d"),
        "User_id" => $_id,
        "Remark" => "Please hold on while we review you request"
    ];

    array_push($_POST, $extra);
    foreach ($_POST as $key => $value) {
        if (is_array($value)) {
            $_POST_DATA[] = implode(",", $value);
        } else {
            $_POST_DATA[] = $value;
        }
    }
    foreach ($_POST as $key => $value) {
        if (is_array($value)) {
            $_POST_DATA_key[] = implode(",", array_keys($value));
        } else {
            $_POST_DATA_key[] = $key;
        }
    }

    $data = explode(",", implode(",", $_POST_DATA));
    $keys = explode(",", implode(",", $_POST_DATA_key));

    // var_dump($data);
    // return;

    if (insert($con, "loan", $keys, $data)) {
        $output = true;
    } else {
        // echo 90909;
        $error = mysqli_error($con);
    }
}
$details = [
    'output1'             =>  $output,
    'error'               =>  $error
];

echo json_encode($details);
