<?php
include '../../config/initiate.php';


$error = "";
$output = "";
$email = "";

$missing = array();
foreach ($_POST as $key => $value) {
    if ($value == "") {
        array_push($missing, $key);
    }
}
if (count($missing) > 0) {
    $output =  "Please Fill all Fields";
    $error = 1;
} else {


    unset($missing);

    $_id = $_POST['id'];
    $_Account_Number = stripslashes(strtoupper($_POST['Account_Number']));
    $_Account_Tel_No = stripslashes(strtoupper($_POST['Account_Tel_No']));
    $_Image_Name = stripslashes(strtoupper($_POST['Image_Name']));
    $_Up_Account_Name = stripslashes(strtolower($_POST["Account_Name"]));
    $_Account_Balance = stripslashes(strtoupper($_POST["Account_Balance"]));
    $_IBAN_Number = stripslashes(strtoupper($_POST["IBAN_Number"]));
    $_Account_Type = stripslashes(strtoupper($_POST["Account_Type"]));
    $_Status = stripslashes(strtoupper($_POST["Status"]));
    $_Amount = stripslashes(strtoupper($_POST["Amount"]));
    $_Account_Email_Address = stripslashes(strtoupper($_POST["Account_Email_Address"]));
    $_Address = stripslashes(strtoupper($_POST["Address"]));
    $_date = stripslashes(strtoupper($_POST['_Date']));
    $Purpose = "Deposite";
    $Reference = Track();

    // echo $_POST["status"];
    // die();

    //echo $dbpquantity;
    // '<br>'.$dbPosible_date_of_arrival." ".$Posible_date_of_arrival;

    $result = mysqli_query(
        $con,
        " SELECT * FROM `account`
                             WHERE 
                             `id` = '" . $_id . "'
                   "
    );
    $count = mysqli_num_rows($result);
    /* USER */
    if ($count > 0) {
        while ($row = mysqli_fetch_assoc($result)) {

            $_Account_no = $row['Account_Number'];
            $db_Curr = $row['Currency'];
            $Account_Email_Address = $row['Account_Email_Address'];
            $User_Tel_number = $row['Account_Tel_No'];
            $db_Account_Balance = $row['Account_Balance'];
        }
        //echo 
        $db_Account_Balance === "NAN"? 0 : $db_Account_Balance;
        $real_sum_Account_Number =  $db_Account_Balance + $_Amount;
        if ($db_Account_Balance < $real_sum_Account_Number) {
          
            if (mysqli_query($con, "
                                                    UPDATE account
                                                        SET
                                                        Account_Balance = '" . $real_sum_Account_Number . "',
                                                        Status = '" . $_Status . "',
                                                        Account_Name = '" . $_Up_Account_Name . "',
                                                        date = '" . $_date . "',
                                                        Account_Type = '" . $_Account_Type . "',
                                                        Account_Email_Address ='" . $_Account_Email_Address . "',
                                                        Account_Tel_No = '".$_Account_Tel_No."'
                                                        
                                                        WHERE 
                    
                                                        id = '" . $_id . "'
                    
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
                                                             '" . $_id . "',
                                                             '" . $_Up_Account_Name . "',
                                                             '" . $_Image_Name . "',
                                                             '" . $Purpose . "',
                                                             '" . $Reference . "',
                                                             '" . $_Amount . "',
                                                             '" . $real_sum_Account_Number . "',
                                                             '" . $_date . "'
                                                                ) ")) {


                    $output = true;
                } else {
                    $error = 1;
                    //  echo 90909;
                    $output = mysqli_error($con);
                }
            } else {
                $error = 1;
                //echo 90;
                $output = mysqli_error($con);
            }
        } else {
            if (mysqli_query($con, "
                                                    UPDATE account
                                                        SET
                                                        
                                                        Status = '" . $_Status . "',
                                                        Account_Name = '" . $_Up_Account_Name . "',
                                                        date = '" . $_date . "',
                                                        Account_Type = '" . $_Account_Type . "',
                                                        Account_Email_Address ='" . $_Account_Email_Address . "',
                                                        Account_Number ='" . $_Account_Number . "',
                                                        Account_Tel_No = '".$_Account_Tel_No."',
                                                        Address ='" . $_Address . "',
                                                        Account_Balance = '" . $_Account_Balance . "'
                                                        
                    
                                                        WHERE 
                    
                                                        id = '" . $_id . "'
                    
                                                        ")) {
                $output = true;
            } else {
                $error = 1;
                //echo 90;
                $output = mysqli_error($con);
            }
        }
    } else {
        $error = 1;
        //echo 90;
        $output = "User not found";
    }

    //echo $dbcdestination."  ".$cDestination;
    //


}

//echo $Posible_date_of_arrival;
//catch all my result and send it throug jason encode;





$details = [
    'output1'             =>  $output,
    'error'               => $error,
];

echo json_encode($details);
