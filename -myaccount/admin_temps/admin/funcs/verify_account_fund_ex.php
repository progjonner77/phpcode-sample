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
    unset($missing);
    // do your stuff here with the $_POST


    //echo $dbcdestination."  ".$cDestination;
    //
    if (check_balance()) {
        $output =  true;
    } else {
        $error = "Balance Insufficient";
    }
}


//echo $Posible_date_of_arrival;
//catch all my result and send it throug jason encode;


$details = [
    'output1'             =>  $output,
    'error'               =>  $error
];

echo json_encode($details);
