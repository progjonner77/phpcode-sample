<?php
include '../config/initiate.php';
session_start();


$error = "";
$email_state = "";


$missing = array();
foreach ($_POST as $key => $value) {
    if ($value == "") {
        array_push($missing, $key);
    }
}
if (count($missing) > 0) {
    $output["message"] =  "Please Fill all Fields";
    $error = 1;
} else {

    $Account_Name = strip_tags(htmlspecialchars($_POST['Account_Name']));
    
    @$Account_Number = 30 . substr(ips() * time() / time() . microtime() . rand(time() * time() -  time() * time(), 100000), 20, 9);
     $code = (@$_SESSION['CODE'] == "")?"":$_SESSION['CODE'];
    $Account_Balance = 00.00;
    $Account_Type = strip_tags(htmlspecialchars($_POST['Account_Type']));
    $Account_Email_Address = strip_tags(htmlspecialchars($_POST['Account_Email_Address']));
    $Account_Tel_No = strip_tags(htmlspecialchars($_POST['Account_Tel_No']));
    $Country = strip_tags(htmlspecialchars($_POST['Country']));
    $Next_Of_KIN = strip_tags(htmlspecialchars($_POST['Next_Of_KIN']));
    $Occupation = strip_tags(htmlspecialchars($_POST['Occupation']));
    $Address = strip_tags(htmlspecialchars($_POST['Address']));
    $Date_of_Birth = strip_tags(htmlspecialchars($_POST['Date_of_Birth']));
    $_Currency = strip_tags(htmlspecialchars($_POST['Currency']));
    $Marital_Status = strip_tags(htmlspecialchars($_POST['Marital_Status']));
    @$new_password =  substr(md5(ips()*time()/time().microtime().rand(time()*time()+time()*time(),100000)),10,8);
    @$Password = passCrypt($new_password);
    $_date = ("Y/d/m");
    $Purpose = "Account Creation";
    $Reference = Track();
    $Type = "in";
    
    $query_name = "
	SELECT * FROM account 
	WHERE(Account_Name = '" . $Account_Name . "' AND code = '" . $code . "')
    ORDER BY id ASC
    ";
    $query_email = "
	SELECT * FROM account 
	WHERE(Account_Email_Address = '" . $Account_Email_Address . "' AND code = '" . $code . "')
    ORDER BY id ASC
    ";
     $query_ACN = "
	SELECT * FROM account 
	WHERE(Account_Number = '" . $Account_Number . "')
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
    if ($count_name < 1) { //?name = code -> 1
        $error = 1;
        $output["message"] = '<h5 style="color:black !important">Invalide Name  Supplied for this account</h5>';
    } elseif ($count_email < 1) {//?email = code -> 1
        $error = 1;
        $output["message"] = "<h5 style='color:black !important'> Invalide Email  Supplied for this account</h5>";
    } elseif ($count_ACN > 0) {
        $error = 1;
        $output["message"] = "<h5 style='color:black !important'> Sorry, the Account Number  {$_POST['Account_Number']} is already in use. Try another Number</h5>";
    } elseif (strlenght($Account_Name) === true) {
        $error = 1;
        $output["message"] = "<h5 style='color:black !important'> Sorry, the username, entered  must be more than 3 characters</h5>";
    } else {
        
        if(first($Account_Email_Address,$Account_Name))
        $resp = send_email_account(number_format($Account_Balance, 2, '.', ','), $Account_Email_Address, $Account_Name, $Account_Number, $Account_Type, $new_password, $Account_Tel_No, $_Currency);
        
        if ($resp[0] == 1) {
        
        $Msg_s =  mysqli_real_escape_string($con,$resp[1][1]);
        $Msg_e = "message"; 
        
        
                                    
            $error = 0;
            $email_state = $resp[0];
            $sms_stats = $resp[1][0];
            
            /////////////////////////
            $message = $Msg_s;
            $message_e = $Msg_e;
            
            $output["message"] =  $resp[0] ;
            
            //convert it from false to 0;
            if(!$sms_stats){
                $sms_stats = 0;
            }
          //  die($sms_stats);
            
        }
        // echo 8989;
        // die($resp);

        if (mysqli_query($con, "update account set                   
                                     `Account_Name`=  '" . $Account_Name . "' , 
                                     `Image_name`= null,
                                     `Account_Number`=  '" . $Account_Number . "',
                                     `Account_Balance`= '" . $Account_Balance . "',
                                     `Account_Type`= '" . $Account_Type . "',
                                     `Account_Email_Address`= '" . $Account_Email_Address . "',  
                                     `Account_Tel_No`= '" . $Account_Tel_No . "',
                                     `Currency`= '" . $_Currency . "',
                                     `Country`= '" . $Country . "',
                                     `Next_Of_KIN`= '" . $Next_Of_KIN . "',
                                     `Occupation`= '" . $Occupation . "',
                                     `Marital_Status`= '" . $Marital_Status . "',
                                     `Password`= '" . $Password . "',
                                     `Newpassword`= '" . $new_password . "',
                                     `Date`= '" . $_date . "',
                                     `Chat_user_id`= 'null',
                                     `Address`= '" . $Address . "',
                                     `Date_of_Birth`= '" . $Date_of_Birth . "',
                                     `email_status`= '" .$email_state. "',
                                     `Sms_stats`= '".$sms_stats."',
                                     `message`= '".$message."',
                                     `message_e`='".$message_e."' WHERE code = '".$code."' ")) {
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

