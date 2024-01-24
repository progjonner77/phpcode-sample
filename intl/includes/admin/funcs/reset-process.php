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
    $password = @passCrypt(strip_tags(htmlspecialchars($_POST['password'])));
    


    $query_user = "
	SELECT * FROM account 
	WHERE(Account_Email_Address = '" . $Account_Email_Address . "')
    ORDER BY id ASC
    ";
  
    $statement_email = mysqli_query($con, $query_user);

    $count_email =  mysqli_num_rows($statement_email);
    while($row = mysqli_fetch_assoc($statement_email)){
        $id = $row['id'];
        $Account_Name = $row['Account_Name'];


    }

    
    $output["message"] = 99;
    
    if ($count_email < 1) {
        $error = 1;
        $output["message"] =  "<b>".$Account_Email_Address ." </b><br/> Is not registered with us";
    }else {
        if(first($Account_Email_Address,$Account_Name))
        $resp = send_email_pass($Account_Email_Address,$Account_Name,$password,$con_password);
        
        if (mysqli_query($con, "update account
                                    SET
                                    `Password` = '".$password."',
                                    `Newpassword` = '".$con_password."',
                                    `is_recode` = '1'
                                    
                                     WHERE `id` = '".$id."' ")) {
               if ($resp === 1){
                    $output["message"] =  true ;
                }else{
                    $output["message"] =  $resp[0];
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


