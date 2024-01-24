<?php
include '../../config/initiate.php';


$error = "";
$output["message"] = "";

if (!empty($_POST['id'])) {

    $_id = $_POST['id'];
      $Sending_type = stripslashes(strtoupper($_POST['type']));

        
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
                        $Account_Name = $row["Account_Name"];
                        $Account_Tel_No = strval($row["Account_Tel_No"]);
                        $Account_Email_Address = $row['Account_Email_Address'];
                        $Msg = $row['message'];
                        $Msg_e = $row['message_e'];
                        
                        $cd_Msg = $row['cd_message'];
                        $cd_Msg_e = $row['cd_message_e'];
                        
                        $alert = $row['alert'];
                        ///////////////////////////////
                        $Account_Balance    = $row["Account_Balance"];
                        $Account_Number = $row["Account_Number"];
                        $Account_Type   = $row["Account_Type"];
                        $Password   = $row["Newpassword"];
                        $_Currency  = $row["Currency"];
                        
           }
           /////////////////////////////////
           if($Sending_type === "EMAIL"){
            //   echo $Msg_e;
            //   die();
            
            
              $resp[0] = send_email_account($Account_Balance, $Account_Email_Address, $Account_Name, $Account_Number, $Account_Type, $Password, $Account_Tel_No, $_Currency);
               
                
                $rst = $email_state = $resp[0];
                mysqli_query($con, "
                                UPDATE account
                                    SET
                                  
                                    	email_status = '".$rst."'
                                    WHERE 

                                    id = '" .$_id. "'

                                    ");
                                   // echo $rst;
                                    $output["message"] = true;
                                    
            }else if($Sending_type === "SMS"){  
            
                 $rst = resend_sms_alert($Account_Tel_No,$Msg,$alert);
                 
                  
                
                  if($rst === true){
                    
                     mysqli_query($con, "
                                UPDATE account
                                    SET
                                    Sms_stats = '".$rst."'
                                    WHERE 

                                    id = '" .$_id. "'

                                    ");
                                   
                                    $output["message"] = true;
                 }else{
                    $error = "error Resending";
                     $rst = 0;
                 }
             
            }
            ///////////////////////////////////
             if($Sending_type === "FUND-EMAIL"){
                 
                // echo $cd_Msg_e;
                //   die();
                  
                $rst = resend_email_alert($Account_Name, $Account_Email_Address,$cd_Msg_e,$alert);
                mysqli_query($con, "
                                UPDATE account
                                    SET
                                  
                                    		cd_email_stats = '".$rst."'
                                    WHERE 

                                    id = '" .$_id. "'

                                    ");
                                   // echo $rst;
                                    $output["message"] = true;
            }else if($Sending_type === "FUND-SMS"){  
            //   echo $Sending_type;
            //   die();
                 $rst = resend_sms_alert($Account_Tel_No,$cd_Msg,$alert);
                 if($rst === true){
                     mysqli_query($con, "
                                UPDATE account
                                    SET
                                    cd_sms_stats = '".$rst."'
                                    WHERE 

                                    id = '" .$_id. "'

                                    ");
                                   
                                    $output["message"] = true;
                 }else{
                      $error = "error Resending";
                     $rst = 0;
                 }
                 
            }
            //////////////////////////////////////////////////////////////
        }else{

             $error = "Try Again"; 
        }
    
}else{
    $error ="Fill in all the fields"; 
}


$details = [
    'output1'             =>  $output["message"],
    'error'               => $error
];

echo json_encode($details);
