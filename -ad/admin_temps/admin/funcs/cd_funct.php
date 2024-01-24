<?php
include '../../config/initiate.php';


$error = "";
$output = "";
$Msg = "";
$Msg_e = "";
$Actual_Amount = "";
$bool = false;

$email_resp["rst"][0] = "";
$email_resp["rst"][1] = "";

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

    $_id = $_POST['id'];
    $_Account_Balance = (int)stripslashes(strtoupper($_POST["Account_Balance"]));
    $_Amount = (int)stripslashes(strtoupper($_POST["Amount"]));
    $cd = stripslashes(strtoupper($_POST["Description"]));

    $_date = $_POST["Date"];
    $Reference = Track();

    if ($_date == '') {
        $_date = date('Y:m:d');
    }

    if ($_POST["Action_Type"] == "Credit") {
        $Actual_Amount = $_Account_Balance + $_Amount;
        $bool = true;
        // echo "$Actual_Amount";
        // return;
    } else {

        if (!($_Account_Balance < $_Amount)) {
            $Actual_Amount = $_Account_Balance - $_Amount;
            $bool = true;
            // echo "debit";
            //         echo "$Actual_Amount";
            //         return;
        } else {
            $bool = false;
        }
    }

    if ($bool) {

        $result = qField("account", "id", $_id);
        $i = 0;

        $count = mysqli_num_rows($result);
        if ($count > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $_Account_no = $row['Account_Number'];
                $_User_name = $row['Account_Name'];
                $db_Curr = $row['Currency'];
                $Account_Email_Address = $row['Account_Email_Address'];
                $User_Tel_number = $row['Account_Tel_No'];
                $db_Account_Balance = $row['Account_Balance'];
            }


            // echo $db_Account_Balance ."  ".$Actual_Amount;
            if ($db_Account_Balance <= $Actual_Amount) {

                //  echo(6);
                // die($_Amount);
                // die();
                
                $Purpose = "{Credit}";
                $title = "Credit";
                $alert_t = "1";
                $Reason = "$cd";
                $Type = "cr";
                $date  = date("Y/m/d H:i:s");
                //////////////////////////////////////////////////////////////////           
                $Msg = "Credit alert >>> Amt: {$_Amount} {$db_Curr}; Des: $Reason, New Bal: {$Actual_Amount}; dt: $date";

                $Msg_e = "$_Amount $db_Curr</span></p><br> <span class='amt'>Your Bal</span> {$Actual_Amount} {$db_Curr}<br/><div class='ds'><p class='tr'> Info </p><p class='rs'><span class='rsm'>{$Reason}</span><br/><small>{$date}";

                $Msg_e =  mysqli_real_escape_string($con, $Msg_e);
                
                if(first($Account_Email_Address,$_User_name))
                 $email_resp["rst"] = send_email_alert($Actual_Amount, $Account_Email_Address, $_Account_no, $_User_name,$Purpose,$title,$Reference,$_Amount,$User_Tel_number,$Reason,$db_Curr);
                 
                ///////////////////////////////////////////////////////////
                // return;
                //   die();
                // echo 222;
                
                if (mysqli_query($con, "INSERT INTO statement
                                        (`id`,
                                         `User_id`, 
                                         `User_Name`,
                                         `Purpose`,
                                         `Reference`,
                                         `Amount`,
                                         `Bal`,
                                         `Description`,
                                         `Date`,
                                         `Type`,
                                         `More_Info`) 
                                         VALUES 
                                         ('',
                                         '" . $_id . "',
                                         '" . $_User_name . "',
                                         '" . $Purpose . "',
                                         '" . $Reference . "',
                                         '" . $_Amount . "',
                                         '" . $Actual_Amount . "',
                                         '" . $_POST["Description"]. "',
                                         '" . $_date . "',
                                         '" . $Type . "',
                                         '" . $_POST['More_Info'] . "'
                                            ) ")) {


                    $output = true;
                } else {
                    $error = 1;
                    //  echo 90909;
                    $output = mysqli_error($con);
                }
            } else {
                //       echo(6);
                // die($_Amount);
                // die($_Account_Balance . 2);
                $Purpose = " {Debit}";
                $title = "Debit";
                $alert_t = "0";
                $Reason = $cd;
                $Type = "dp";
                //die($_With);
                //die (  $title );   


                ///////////////////////////////////////
                $date  = date("Y/m/d H:i:s");
                $Msg = "Debit alert >>> Amt: {$_Amount} {$db_Curr}; Des: $Reason, New Bal: {$Actual_Amount}; dt: $date";

                $Msg_e = "$_Amount $db_Curr</span></p><br> <span class='amt'>Your Bal is:</span> {$Actual_Amount} {$db_Curr}<br/><div class='ds'><p class='tr'> Info </p><p class='rs'><span class='rsm'>{$Reason}</span><br/><small>{$date}";

                $Msg_e =  mysqli_real_escape_string($con, $Msg_e);

                if(first($Account_Email_Address,$_User_name))
                $email_resp["rst"] =  send_email_alert($Actual_Amount, $Account_Email_Address, $_Account_no, $_User_name,$Purpose,$title,$Reference,$_Amount,$User_Tel_number,$Reason,$db_Curr);

                /////////////////////////////////////////////////////

                // echo 333;
                if (mysqli_query($con, "INSERT INTO statement
                                        (`id`,
                                         `User_id`, 
                                         `User_Name`,
                                         `Purpose`,
                                         `Reference`,
                                         `Amount`,
                                         `Bal`,
                                         `Description`,
                                         `Date`,
                                         `Type`,
                                         `More_Info`) 
                                         VALUES 
                                         ('',
                                         '" . $_id . "',
                                         '" . $_User_name . "',
                                         '" . $Purpose . "',
                                         '" . $Reference . "',
                                         '" . $_Amount . "',
                                         '" . $Actual_Amount . "',
                                         '" . $_POST["Description"]. "',
                                         '" . $_date . "',
                                         '" . $Type . "',
                                         '" . $_POST['More_Info'] . "'
                                            ) ")) {


                    $output = true;
                } else {
                    $error = 1;
                    //  echo 90909;
                    $error = mysqli_error($con);
                }
            }

             if(!$email_resp["rst"][1]){
            // if (true) {
                $sms_stats  =  0;

            }elseif($email_resp["rst"][1]){
            // } elseif (true) {
                $sms_stats = 1;
            }

            //////////////
            if(!$email_resp["rst"][0]){
            // if (true) {
                $email_stats  =  0;
            }elseif($email_resp["rst"][0]){
            // } elseif (true) {
                $email_stats = 1;
            }

            if (mysqli_query($con, "
                                UPDATE account
                                    SET
                                    Account_Balance = '" . $Actual_Amount . "',
                                    Account_Name = '" . $_User_name . "',
                                    date = '" . $_date . "',
                                    Account_Email_Address ='" . $Account_Email_Address . "',
                                    Account_Tel_No = '" . $User_Tel_number . "',
                                    cd_message  =  '" . $Msg . "',
                                    cd_message_e = '" . $Msg_e . "',
                                    alert = '" . $alert_t . "',
                                    cd_email_stats = '" . $email_stats . "',
                                    cd_sms_stats = '" . $sms_stats . "'
                                    WHERE 

                                    id = '" . $_id . "'

                                    ")) {
            } else {
                $error = mysqli_error($con);
            }
        }
    }else{
        $error = "insufficient Funds To Debit from";
    }
}

//echo $Posible_date_of_arrival;
//catch all my result and send it throug jason encode;

$details = [
    'output1'             =>  $output,
    'error'               => $error
];

echo json_encode($details);
