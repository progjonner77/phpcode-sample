<?php
include '../../config/initiate.php';



if (!empty($_POST['id'])) {

    $_id = $_POST['id'];
    $_Account_Number = stripslashes(strtoupper($_POST['Account_Number']));
    $_Image_Name = stripslashes(strtoupper($_POST['Image_Name']));
    $_Account_Name = stripslashes(strtolower($_POST["Account_Name"]));
    $_Account_Balance = stripslashes(strtoupper($_POST["Account_Balance"]));
    $_IBAN_Number = stripslashes(strtoupper($_POST["IBAN_Number"]));
    $_Account_Type = stripslashes(strtoupper($_POST["Account_Type"]));
    $_Status = stripslashes(strtoupper($_POST["Status"]));
    $_Amount = stripslashes(strtoupper($_POST["Amount"]));
    $_Account_Email_Address = stripslashes(strtoupper($_POST["Account_Email_Address"]));
    $Purpose = "Deposite";
    $Reference = Track();
    
    // echo $_POST["status"];
    // die();

    //echo $dbpquantity;
    // '<br>'.$dbPosible_date_of_arrival." ".$Posible_date_of_arrival;

    if (mysqli_query($con, "
                                UPDATE account
                                    SET
                                    Account_Balance = '" . $_Account_Balance . "',
                                    Status = '" . $_Status . "'
                                    WHERE 

                                    id = '" .$_id. "'

                                    ")) {            

            
                if (mysqli_query($con, "INSERT INTO statement
                                        (`id`,
                                         `User_id`, 
                                         `User_Name`,
                                         `Image_Name`,
                                         `Purpose`,
                                         `Reference`,
                                         `Amount`,
                                         `Bal`,
                                         `Date`) 
                                         VALUES 
                                         ('',
                                         '".$_id ."',
                                         '". $_Account_Name."',
                                         '". $_Image_Name."',
                                         '". $Purpose."',
                                         '". $Reference."',
                                         '". $_Amount."',
                                         '". $_Account_Balance."',
                                         '".date("Y:m")."'
                                            ) ")) {

            
            $output["message"] = true;
        } else {
                    echo 90909;
            $output["message"] = mysqli_error($con);
        }
    } else {
        echo 90;
        $output["message"] = mysqli_error($con);
    }


    //echo $dbcdestination."  ".$cDestination;
    //

   
} else {
    $output["message"] = "Error Occured";
}

//echo $Posible_date_of_arrival;
//catch all my result and send it throug jason encode;





$details = [
    'output1'             =>  $output["message"],
];

echo json_encode($details);
