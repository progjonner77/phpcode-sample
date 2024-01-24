<?php
include '../config/initiate.php';
session_start();


$error = "";
$email_state = "";


$missing = array();
foreach ($_POST as $key => $value) {
    if ($value == "") {
        array_push($missing, $key);
    }
}
if (count($missing) > 0) {
    $output["message"] =  "Please Fill all Fields";
    $error = 1;
} else {


    $code = strip_tags(htmlspecialchars($_POST['Code']));
    $Account_Email_Address = strip_tags(htmlspecialchars($_POST['Account_Email_Address']));

    $query_code = "
	SELECT * FROM account 
	WHERE(code = '" . $code . "')
    ORDER BY id ASC
    ";

    
    $query_email = "
	SELECT * FROM account 
	WHERE(Account_Email_Address = '" . $Account_Email_Address . "' AND code = '" . $code . "')
    ORDER BY id ASC
    ";
    $statement_code = mysqli_query($con, $query_code);
    $statement_email = mysqli_query($con, $query_email);

    $count_code = mysqli_num_rows($statement_code);
    $count_email =  mysqli_num_rows($statement_email);

    $output["message"] = 99;
    //a change is noticed 
    if ($count_code < 1) { //?name = code -> 1
        $error = 1;
        $output["message"] = '<h5 style="color:black !important">Invalide code  Supplied for this account</h5>';
    } elseif ($count_email < 1) {//?email = code -> 1
        $error = 1;
        $output["message"] = "<h5 style='color:black !important'> Invalide Email  Supplied for this account</h5>";
    } else {
        $output["message"] = true;
        $_SESSION['CODE'] = $code;
    }
}
$details = [
    'output1'             =>  $output["message"],
    'error'               => $error,
    'email_state'         => $email_state
];

echo json_encode($details);

