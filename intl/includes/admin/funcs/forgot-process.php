<?php
include '../../config/initiate.php';



$error = "";
$email_state = "";
$output["message"]="";

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

    $Account_Email_Address = strip_tags(htmlspecialchars($_POST['Email']));


    $query_email = "
	SELECT * FROM account 
	WHERE(Account_Email_Address = '" . $Account_Email_Address . "')
    ORDER BY id ASC
    ";
  
    
    $statement_email = mysqli_query($con, $query_email);

    $count_email =  mysqli_num_rows($statement_email);
    while($row = mysqli_fetch_assoc($statement_email)){
        $id = $row['id'];
        $Account_Name = $row['Account_Name'];
        $is_recode =  $row['is_recode'];
        $re_code = $row['re_code'];
    }

    
    $output["message"] = 99;
    
    if ($count_email < 1) {
        $error = 1;
        $output["message"] =  "<b> {$_POST['Email']} </b>&nbsp;  Is not registered with us";
    }else {
        
        if($is_recode == 1){
        $code = substr(md5(time() / time() . microtime() . rand($_SERVER['REMOTE_ADDR'] * $_SERVER['SCRIPT_NAME'] / time() * time() - $_SERVER['SCRIPT_NAME'] + time() * time() * $_SERVER['SCRIPT_NAME'] * $_SERVER['REMOTE_ADDR'], 100000)), 20, 20);
        } elseif($re_code == ""){
              $code = substr(md5(time() / time() . microtime() . rand($_SERVER['REMOTE_ADDR'] * $_SERVER['SCRIPT_NAME'] / time() * time() - $_SERVER['SCRIPT_NAME'] + time() * time() * $_SERVER['SCRIPT_NAME'] * $_SERVER['REMOTE_ADDR'], 100000)), 20, 20);
        }else{
            $code = $re_code;
        }
        
        if(first($Account_Email_Address,$Account_Name))
        $resp = send_email_recode($Account_Email_Address,$Account_Name,$code);
        
        if (mysqli_query($con, "update account
                                    SET
                                    `re_code` = '".$code."',
                                    `is_recode` = '0'
                                     WHERE `id` = '".$id."' ")) {
               if ($resp === 1){
                    $output["message"] =  false ;
                }else{
                    $output["message"] =  $resp;
                }
        
        }
    }
 
}

$details = [
    'output1'             =>  $output["message"],
    'error'               => $error,
    'email_state'         => $email_state
];

echo json_encode($details);


