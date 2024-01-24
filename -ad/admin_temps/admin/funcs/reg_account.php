<?php
include '../../config/initiate.php';



$error = "";
$email_state = "";
$output["message"] ="";

$missing = array();
foreach ($_POST as $key => $value) {
    if ($value == "") {
        array_push($missing, $key);
    }
}
if (count($missing) > 0) {
    $error ="Please Fill all Fields";
} else {


    @$new_password = substr(md5(ips() * time() / time() . microtime() . rand($_SERVER['REMOTE_ADDR'] * $_SERVER['SCRIPT_NAME'] / time() * time() - $_SERVER['SCRIPT_NAME'] + time() * time() * $_SERVER['SCRIPT_NAME'] * $_SERVER['REMOTE_ADDR'], 100000)), 10, 8);

    @$Password = passCrypt($new_password);
    $_date = stripslashes(strtoupper($_POST['Date']));
    $Purpose = "Account Creation";
    $Reference = Track();
    $Type = "in";

    $query_name = "
	SELECT * FROM account 
	WHERE(Account_Name = '" . $_POST['Account_Name'] . "')
    ORDER BY id ASC
    ";
    $query_email = "
	SELECT * FROM account 
	WHERE(Account_Email_Address = '" . $_POST['Account_Email_Address'] . "')
    ORDER BY id ASC
    ";
    $query_ACN = "
	SELECT * FROM account 
	WHERE(Account_Number = '" . $_POST['Account_Number'] . "')
    ORDER BY id ASC
    ";
    $statement_name = mysqli_query($con, $query_name);
    $statement_email = mysqli_query($con, $query_email);
    $statement_ACN = mysqli_query($con, $query_ACN);

    $count_name = mysqli_num_rows($statement_name);
    $count_email =  mysqli_num_rows($statement_email);
    $count_ACN =  mysqli_num_rows($statement_ACN);
    $output["message"] = 99;
    //a change is noticed

    if ($count_name > 0) {
        $error = 'Sorry, the Account Name. \'' . $_POST['Account_Name'] . '\' is already taken Please enter a new name for a fresh User, for safty reasons';
    } elseif ($count_email > 0) {
        $error = "Sorry, the Email <b>\"" . $_POST['Account_Email_Address'] . "\"</b> is already in use. Please enter a new email for a fresh User, for safety  reasons";
    } elseif ($count_ACN > 0) {
        $error = "Sorry, the Account Number  {$_POST['Account_Number']} is already in use. Try another Number";
    } elseif (strlenght($_POST['Account_Name']) === true) {
        $error =  "Sorry, the username, entered  must be more than 3 characters";
    } else {


   
     $resp =   send_email_account(number_format($_POST['Account_Balance'], 2, '.', ','), $_POST['Account_Email_Address'], $_POST['Account_Name'], $_POST['Account_Number'], $_POST['Account_Type'], $new_password, $_POST['Account_Tel_No'], $_POST['Currency']);
       

        if ($resp[0] == 1) {

            $Msg_s =  mysqli_real_escape_string($con,"No SMS");
            $Msg_e =  mysqli_real_escape_string($con, "No Email");


            $error = 0;
            $email_state = $resp[0];
            $sms_stats = $resp[1][0];

            /////////////////////////
            $message = "$Msg_s";
            $message_e = "message";

            $output["message"] =  $resp[0];

            //convert it from false to 0;
            if (!$sms_stats) {
                $sms_stats = 0;
            }
            //  die($sms_stats);

        }
        // echo 8989;
        // die($resp);
        $extra = [
            "Password" => $Password,
            "Newpassword" => $new_password,
            "Chat_user_id" => 'null',
            "email_status" => $email_state,
            "Sms_stats" => $sms_stats,
            "message" => $message,
            "message_e" => $message_e,
        ];


    // var_dump($data);
    // return;
    $myResult = justin($extra, 'account');
        if ($myResult) {
            $output["message"] = true;
        } else {
            $error = 1;
            $output["message"] = mysqli_error($con);
        }
    }
}
$details = [
    'output1'             =>  $output["message"],
    'error'               => $error,
    'email_state'         => $email_state
];

echo json_encode($details);
