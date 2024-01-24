<?php
include '../../config/initiate.php';


$error = "";
if (!empty($_POST['id'])) {

    $_id = $_POST['id'];
    $_Account_Name = stripslashes(strtolower($_POST["Account_Name"]));
    $_Status = stripslashes(strtoupper($_POST["Status"]));
    // echo $_POST["status"];
    // die();

    //echo $dbpquantity;
    // '<br>'.$dbPosible_date_of_arrival." ".$Posible_date_of_arrival;

    if (mysqli_query($con, "
                                UPDATE loan
                                    SET
                                    Status = '" . $_Status . "'
                                    WHERE 
                                    
                                    id = '" . $_id . "'
                                    
                                    ")) {
        $output["message"] = true;
    } else {
        $output["message"] = mysqli_error($con);
        $error = 1;
    }


    //echo $dbcdestination."  ".$cDestination;
    //


} else {
    $output["message"] = "Error Occured";
    $error = 1;
}

//echo $Posible_date_of_arrival;
//catch all my result and send it throug jason encode;





$details = [
    'output1'             =>  $output["message"],
    'error'               => $error 
];

echo json_encode($details);
