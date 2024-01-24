<?php
include '../../config/initiate.php';


$error = "";
$output = "";
$row = "";
//var_dump($_POST);
if (!empty($_POST)) {
  
    $_Account_Name = stripslashes(strtoupper($_POST['Account_Name']));

    // echo $_POST["status"];
    // die();

    //echo $dbpquantity;
    // '<br>'.$dbPosible_date_of_arrival." ".$Posible_date_of_arrival;
    $result = mysqli_query(
        $con,
        " SELECT * FROM `account`
                 WHERE 
                 `Account_Name` = '".$_Account_Name."'
       "
    );
    $count = mysqli_num_rows($result);
    if ($count > 0) {
        $row = mysqli_fetch_assoc($result);
        $output = true;
    } else {
        $error = "Wrong Account Details Suplied";
    }

    //echo $dbcdestination."  ".$cDestination;
    //


} else {
    $error = "Fill all the Fields";
}

//echo $Posible_date_of_arrival;
//catch all my result and send it throug jason encode;


$details = [
    'output1'             =>  $output,
    'row'                 => $row,
    'error'               =>  $error
];

echo json_encode($details);
