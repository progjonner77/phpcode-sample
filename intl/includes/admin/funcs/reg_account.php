<?php
include '../config/initiate.php';

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
    $Account_Email_Address = strip_tags(htmlspecialchars($_POST['Account_Email_Address']));

    $query_name = "
	SELECT * FROM account 
	WHERE(Account_Name = '" . $Account_Name . "')
    ORDER BY id ASC
    ";
    
    $query_email = "
	SELECT * FROM account 
	WHERE(Account_Email_Address = '" . $Account_Email_Address . "')
    ORDER BY id ASC
    ";
  
    $statement_name = mysqli_query($con, $query_name);
    $statement_email = mysqli_query($con, $query_email);
;

    $count_name = mysqli_num_rows($statement_name);
    $count_email =  mysqli_num_rows($statement_email);

    $output["message"] = 99;
    //a change is noticed 
    if ($count_name > 0) {
        $error = 1;
        $output["message"] = '<h5 style="color:black !important">Sorry,<br/> the Account Name. \'' . $_POST['Account_Name'] . '\' is already taken Please enter a new name for a fresh User, for safty reasons,</h5>';
    } elseif ($count_email > 0) {
        $error = 1;
        $output["message"] = "<h5 style='color:black !important'>Sorry, <br/>the Email <b>\"" . $_POST['Account_Email_Address'] . "\"</b><br/> is already in use. Please enter a new email for a fresh User, for safety  reasons </h5>";
 
    } elseif (strlenght($Account_Name) === true) {
        $error = 1;
        $output["message"] = "<h5 style='color:black !important'> Sorry, the username, entered  must be more than 3 characters </h5>";
    } else {
        
        $code = rand(100000,999999);
        if(first($Account_Email_Address,$Account_Name))
        $resp =send_email_reg($Account_Email_Address, $Account_Name,$code);
        
        if (mysqli_query($con, "INSERT INTO account
                                    (`id`,                            
                                     `Account_Name`,
                                     `Account_Email_Address`,
                                     `code` 
                                     ) 
                                     VALUES 
                                     ('',
                                     '" . $Account_Name . "',
                                     '" . $Account_Email_Address ."',
                                     '" . $code . "') ")) {
               if ($resp === 1){
                    $output["message"] =  true ;
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

