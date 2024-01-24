<?php
include '../../config/initiate.php';


$error = "";
$output = "";

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
    $_id = $_SESSION['Account_id'];
    $_User_Account_Name =  $_SESSION['Account_Name'];
    $_id_credit_ben = stripslashes(strtoupper($_POST['user_gift']));
    $_id_credit = stripslashes(strtoupper($_POST['gift']));
    $_Account_Name = stripslashes(strtoupper($_POST['Account_Name']));
    $_Account_Number = stripslashes(strtoupper($_POST['Account_Number']));
    $_Account_Balance = stripslashes(strtoupper($_POST['Account_Balance']));
    //$_Beneficiary_bank_name = stripslashes(strtoupper($_POST['Beneficiary_bank_name']));
    $_Amount = stripslashes($_POST['Amount']);
    $_Currency = symbolToName(stripslashes($_POST['Currency']));


    //$_Purpose_For_Transfer= stripslashes(strtoupper($_POST['Purpose_For_Transfer']));
    $_Transfer_token = stripslashes(strtoupper($_POST['Transfer_token']));

    @$Reference = Track();
    $_Purpose_For_Transfer = "Transfer to " . $_Account_Name;
    $_Purpose_For_Transfer_ben = "Transfer From " . $_User_Account_Name;

    $Type = "in";
    // echo $_POST["status"];
    // die();



    //echo $dbcdestination."  ".$cDestination;
    $result = mysqli_query(
        $con,
        " SELECT * FROM `codes`
                 WHERE 
                 `User_Name` = '" . $_User_Account_Name . "'
                 AND
                 `Code`=  '" . $_Transfer_token . "'
                 AND 
                 `Code_Name`=  'TOKEN'
       "
    );

    $count = mysqli_num_rows($result);
    if ($count > 0) {

        $result = mysqli_query(
            $con,
            " SELECT * FROM `account`
                     WHERE 
                     `id` = '" . $_id . "'
           "
        );
        $count = mysqli_num_rows($result);
        if ($count > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $_User_Name = $row["Account_Name"];
                $db_Bal = strval($row["Account_Balance"]);
                $_Account_no = $row['Account_Number'];
                $User_Tel_number = $row["Account_Tel_No"];
                $Account_Email_Address = $row["Account_Email_Address"];
                $db_Curr = $row['Currency'];
            }


            /*$Bal1 = mb_substr($db_Bal,1,strlen($db_Bal) - 1,'UTF-8'); //gets the number only
           @$Bal_sum = db_Bal - $_Amount; //sum it here
           $Bal_total = mb_substr($db_Bal,0,1,'UTF-8').$Bal_sum; // then add the currency
           // die();*/

            @$Bal_sum = $db_Bal - $_Amount;
            $Bal_total = $Bal_sum;
        }
        //echo mb_substr($db_Bal,0,1,'UTF-8'); //get gibrish

        // get the currency attached to the first character {mb_substr($db_Bal, 0, 1, 'UTF-8')}   

        if ($db_Curr === $_Currency) {
            if ($Bal_sum > 0) {
                $result = mysqli_query(
                    $con,
                    " SELECT * FROM `account`
                                WHERE 
                                `id` = '" . $_id_credit_ben . "'
                                AND
                                Account_Name = '" . $_Account_Name . "'
                                AND
                                Account_Number = '" . $_Account_Number . "'
                    "
                );
                $count = mysqli_num_rows($result);
                if ($count > 0) {

                    while ($row = mysqli_fetch_assoc($result)) {
                        $_Account_Name = $row["Account_Name"];
                        $Ben_Account_Email_Address = $row["Account_Email_Address"];
                        $_Account_Number = $row['Account_Number'];
                        $_Ben_tel_inter = $row["Account_Tel_No"];
                        $db_Curr = $row['Currency'];
                    }
                    $email = send_email(number_format($Bal_total, 2, '.', ','), number_format($_Account_Balance, 2, '.', ','), number_format($_Amount, 2, '.', ','), $Account_Email_Address, $Ben_Account_Email_Address, $_User_Account_Name, $_Account_no, $_Account_Number, $_Ben_tel_inter, $User_Tel_number, $_Account_Name, $_Currency, "d");
                    if ($email == 1) {
                        $email = send_email(number_format($Bal_total, 2, '.', ','), number_format($_Account_Balance, 2, '.', ','), number_format($_Amount, 2, '.', ','), $Account_Email_Address, $Ben_Account_Email_Address, $_User_Account_Name, $_Account_no, $_Account_Number, $_Ben_tel_inter, $User_Tel_number, $_Account_Name, $_Currency, "mmmm");
                    }
                    //die($email);
                    if (mysqli_query($con, "
                            UPDATE account
                                SET
                                Account_Balance = '" . $Bal_total . "'
                                WHERE 
        
                                Account_Name = '" . $_User_Name . "'
                                AND
                                Account_Number = '" . $_Account_no . "'
        
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
                                                                `Type`,
                                                                `Date`) 
                                                                VALUES 
                                                                ('',
                                                                '" . $_id . "',
                                                                '" . $_User_Name . "',
                                                                'Null',
                                                                '" . $_Purpose_For_Transfer . " {Debit}',
                                                                '" . $Reference . "',
                                                                '" . $_Amount . "',
                                                                '" . $Bal_total . "',
                                                                '" . $Type . "',
                                                                '" . date("Y:m:d") . "'
                                                                    ) ")) {
                            //   17014302
                            $output = true;
                            //success
                            if (mysqli_query($con, "
                                                            UPDATE account
                                                                SET
                                                                Account_Balance = '" . $_Account_Balance . "'
                                                                WHERE 

                                                                Account_Name = '" . $_Account_Name . "'
                                                                AND
                                                                Account_Number = '" . $_Account_Number . "'

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
                                                                    `Type`,
                                                                    `Date`) 
                                                                    VALUES 
                                                                    ('',
                                                                    '" . $_id_credit_ben . "',
                                                                    '" . $_Account_Name . "',
                                                                    'Null',
                                                                    '" . $_Purpose_For_Transfer_ben . "  {Credit}',
                                                                    '" . $Reference . "',
                                                                    '" . $_Amount . "',
                                                                    '" . $_Account_Balance . "',
                                                                    '" . $Type . "',
                                                                    '" . date("Y:m:d") . "'
                                                                        ) ")) {
                                    $output = true;
                                } else {

                                    //  echo 90909;
                                    $error = mysqli_error($con);
                                }
                            } else {
                                //echo 90;
                                $error = mysqli_error($con);
                            }
                            //echo $dbpquantity;
                            // '<br>'.$dbPosible_date_of_arrival." ".$Posible_date_of_arrival;
                        } else {
                            //  echo 90909;
                            $error = mysqli_error($con);
                        }
                    } else {
                        //echo 90;
                        $error = mysqli_error($con);
                    }
                } else {
                    $error = "Account Details of Beneficiary Not Found";
                }
            } else {
                $error = "Insuficient Fund";
            }
        } else {
            $error = "The Currency " . $_Currency . " Dose not Match with" . $db_Curr;
        }
    } else {
        $error = "Wrong Token";
    }
}


//echo $Posible_date_of_arrival;
//catch all my result and send it throug jason encode;





$details = [
    'output1'             =>  $output,
    'error'               =>  $error
];

echo json_encode($details);
