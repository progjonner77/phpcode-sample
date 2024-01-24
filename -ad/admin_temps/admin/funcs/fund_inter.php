<?php
include '../../config/initiate.php';


$error = "";
$output = "";

$missing = array();
 foreach ($_POST as $key => $value) { if ($value == "") { array_push($missing, $key);}}
 if (count($missing) > 0) {
 $error =  "Please Fill all Fields";
  } else {
  unset($missing);
  // do your stuff here with the $_POST
    $_id = $_SESSION['user_id'];
    $_User_Account_Name =  $_SESSION['username'];
    $_id_credit = stripslashes(strtoupper($_POST['gift']));
    $_Account_Name = stripslashes(strtoupper($_POST['Account_Name']));
    $_Account_Number = stripslashes(strtoupper($_POST['Account_Number']));
    $_Account_Balance = stripslashes(strtoupper($_POST['Account_Balance']));
    $_Beneficiary_bank_name = stripslashes(strtoupper($_POST['Beneficiary_bank_name']));
    $_Amount = stripslashes($_POST['Amount']);
    $_Currency = stripslashes($_POST['Currency']);
    //$_Purpose_For_Transfer= stripslashes(strtoupper($_POST['Purpose_For_Transfer']));
    $_Transfer_token = stripslashes(strtoupper($_POST['Transfer_token']));

   @ $Reference = Track();
    $_Purpose_For_Transfer = "Transfer to ". $_Account_Name;
    // echo $_POST["status"];
    // die();
    //echo $dbcdestination."  ".$cDestination;
    //
    $result = mysqli_query(
        $con,
        " SELECT * FROM `codes`
                 WHERE 
                 `User_Name` = '" . $_User_Account_Name . "'
                 AND
                 `Code`=  '" . $_Transfer_token . "'
       "
    );
    $count = mysqli_num_rows($result);
    if ($count > 0) {
        $result = mysqli_query(
            $con,
            " SELECT * FROM `account`
                     WHERE 
                     `id` = '".$_id."'
           "
        );
        $count = mysqli_num_rows($result);
        if ($count > 0) {
           while($row = mysqli_fetch_assoc($result)){
                $_User_Name = $row["Account_Name"];
                $db_Bal = strval($row["Account_Balance"]);
                $_Account_no = $row['Account_Number'];
           }
           $Bal1 = mb_substr($db_Bal,1,strlen($db_Bal) - 1,'UTF-8');
           @$Bal_sum = $Bal1 - $_Amount;
           $Bal_total = mb_substr($db_Bal,0,1,'UTF-8').$Bal_sum;
           // die();
        } 
        //echo mb_substr($db_Bal,0,1,'UTF-8'); //get gibrish
    if (send_email($Account_Balance, $Account_Email_Address, $Account_Name, $Account_Number, $Account_Type, $Password) == 1) {
        if (mb_substr($db_Bal, 0, 1, 'UTF-8') == $_Currency) {
            if ($Bal_sum > 0) {
                if (mysqli_query($con, "
                        UPDATE account
                            SET
                            Account_Balance = '" .$Bal_total. "'
                            WHERE 
    
                            Account_Name = '" .$_User_Name. "'
                            AND
                            Account_Number = '" .$_Account_no. "'
    
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
                                                            '" . $_User_Name . "',
                                                            'Null',
                                                            '" . $_Purpose_For_Transfer . " {Debit}',
                                                            '" . $Reference . "',
                                                            '" . $_Currency.$_Amount . "',
                                                            '" . $Bal_total . "',
                                                            '" . date("Y:m:d") . "'
                                                                ) ")) {
                        $output = true;
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
                $error = "Insuficient Balance";
            }
        } else {
            $error = "The Currency ".$_Currency ." Dose not Match with" . mb_substr($db_Bal, 0, 1, 'UTF-8') ;
        }
    }
    } else {
        $error = "Wrong COT CODE";
    }
}


//echo $Posible_date_of_arrival;
//catch all my result and send it throug jason encode;
$details = [
    'output1'             =>  $output,
    'error'               =>  $error
];

echo json_encode($details);
