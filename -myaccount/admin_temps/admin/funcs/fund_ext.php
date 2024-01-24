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



$_Amount   =  $_POST['Amount'];
$Ben_Bank   =  $_POST['Ben_Bank'];
$Ben_Accno   =  $_POST['Ben_Accno'];
$Ben_Accname   =  $_POST['Ben_Accname'];
$More_info   =  $_POST['More_info'];


    @$Reference = Track();
    $_Purpose_For_Transfer = "Transfer to " . $Ben_Accname;


    $result = mysqli_query(
        $con,
        " SELECT * FROM `account`WHERE `id` = '" . $_id . "'"
    );

    $count = mysqli_num_rows($result);
    if ($count > 0) {

        while ($row = mysqli_fetch_assoc($result)) {
            $_User_Name = $row["Account_Name"];
            $db_Bal = strval($row["Account_Balance"]);
            $_Account_no = $row['Account_Number'];
            $Account_Email_Address = $row["Account_Email_Address"];
            $db_Curr = $row["Currency"];
            $User_Tel_number = $row['Account_Tel_No'];
        }

        $Bal1 = $db_Bal;
        @$Bal_sum = $Bal1 - $_Amount;
        $Bal_total = $Bal_sum;

        // echo(878978);
    }

   if ($Bal_sum > 0) {
        
         if(first($Account_Email_Address,$_User_Account_Name))
            $result =  send_email_int(number_format($Bal_total, 2, '.', ','), number_format($_Amount, 2, '.', ','), $Account_Email_Address, $_User_Account_Name, $Ben_Accno, $Ben_Bank, $Ben_Accname, $User_Tel_number, $db_Curr, $More_info, "d");
            
//var_dump($result);
//die();

        if (1) {

            if (mysqli_query($con, "
                                                UPDATE account
                                                    SET
                                                    Account_Balance = '" . $Bal_total . "'
                                                    WHERE 
                            
                                                    Account_Name = '" . $_User_Name . "'
                                                    ")) {
                                                        
                                                        
                                                        $extra = [
                                                            "User_Name" => $_User_Account_Name,
                                                            "Reference" => $Reference,
                                                            "Date" => date("Y:m:d"),
                                                            "user_id" => $_id,
                                                            "Purpose" => "Transfer", 
                                                            "Bal"   => $Bal_total,
                                                            "Type" => 'Tr',
                                                          ];
                                                        
                                                          $myResult = justin($extra, 'statement');


                if ($myResult ) {


                    if (mysqli_query($con, "
                                                UPDATE `codes`
                                                    SET
                                                    `Usage` = 0
                                                    WHERE 
                                                     `User_Name` = '" . $_User_Account_Name . "'
                                                     AND
                                                     `Code_Name` = 'COT'
                                                    ")) {

                        if (mysqli_query($con, "
                                                            UPDATE `codes`
                                                                SET
                                                                `Usage` = 0
                                                                WHERE 
                                                                 `User_Name` = '" . $_User_Account_Name . "'
                                                                 AND
                                                                 `Code_Name` = 'SAC'
                                                                ")) {

                            if (mysqli_query($con, "
                                                                        UPDATE `codes`
                                                                            SET
                                                                            `Usage` = 1
                                                                            WHERE 
                                                                        `User_Name` = '" . $_User_Account_Name . "'
                                                                             AND
                                                                             `Code_Name` = 'OTA'
                                                                            ")) {

                                $output = true;
                            }
                        }
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
            $error = "Error Accessing API Sending message";
        }
    } else {
        $error = "Insuficient Balance";
    }

    //   var_dump(send_email($_Amount, $Bal_total, "info@quift.site",$_User_Name, $_Account_Number,$_Account_Name, $_Beneficiary_bank_name,$_Currency));
    //   die();
}


//echo $Posible_date_of_arrival;
//catch all my result and send it throug jason encode;

$details = [
    'output1'             =>  $output,
    'error'               =>  $error
];

echo json_encode($details);
