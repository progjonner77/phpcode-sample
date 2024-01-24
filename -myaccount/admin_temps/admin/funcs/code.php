<?php
include '../../config/initiate.php';


$error = "";
$output = "";
$next_code = "";
$next_ = "";

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
    $code = trim(stripslashes(strtoupper($_POST["Code"])));
    $code_type = stripslashes(strtoupper($_POST["Code_Name"]));


    // do your stuff here with the $_POST
    //echo $dbcdestination."  ".$cDestination;
    //
    $code_result = Code($_POST["Code"], $_POST["Code_Name"]);

    if ($code_result == "true") {
        if ($code_type == "COT") {
            $next_code = "OTP";
        } elseif ($code_type == "OTP") {
            $next_code = "OTA";
        } elseif ($code_type == "OTA") {
            $next_ = true;
        }
        $output =  true;
    } elseif ($code_result == "used") {
        $error = "$code_type Code Already Used";
    } elseif ($code_result == "Default") {
        $error = "Sorry You need to request for a $code_type code";
    } else {
        $error = "Wrong $code_type Code supplied";
    }
}

//echo $Posible_date_of_arrival;
//catch all my result and send it throug jason encode;


$details = [
    'output1'             =>  $output,
    'error'               =>  $error,
    'code_type'           =>  $next_code,
    'next_'               =>  $next_,
];

echo json_encode($details);
