<?php
include '../../config/initiate.php';



$error = "";
$email_state = "";
$output ="";

$missing = array();
foreach ($_POST as $key => $value) {
    if ($value == "") {
        array_push($missing, $key);
    }
}
if (count($missing) > 0) {
    $error ="Please Fill all Fields";
} else {


    $count = (getField_count('crypto', 'crypto_name', $_POST['crypto_name']));

    if ($count > 0) {
        $error = 'Sorry, the . \'' . $_POST['crypto_name'] . '\' is already taken';
    }else {

        $extra = [
            "id" => "",
            'date' => date('Y:m:d'),
        ];

    $myResult = justin($extra, 'crypto');
        if ($myResult) {
            $output = true;
        } else {
             $error = mysqli_error($con);
        }
    }
}
$details = [
    'output1'             =>  $output,
    'error'               => $error,
];

echo json_encode($details);
