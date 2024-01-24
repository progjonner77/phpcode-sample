<?php
include '../../config/initiate.php';


$error = "";
$output = "";
$myResult = "";

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
  $User_Name =  $_SESSION['Account_Name'];
  @$Reference = Track();

  $extra = [
    "User_Name" => $User_Name,
    "reference" => $Reference,
    "Date" => date("Y:m:d"),
    "user_id" => $_id,
    "remark" => "Please hold on while we review you request"
  ];

  $myResult = justin($extra, 'card_request');

  if ($myResult) {

    $where = [
      'id' => $_id
    ];

    $data = [
      'Status_Card' => "Active",
    ];

    $statement_pass = selectUpdate($con, "account", $data, $where);

    if ($statement_pass) {
      $output = true;
    } else {
      $error  = 'User Not Found';
    }
  } else {
    $error  = 'Error found while processing';
  }
}
$details = [
  'output1'             =>  $output,
  'error'               =>  $error
];

echo json_encode($details);
