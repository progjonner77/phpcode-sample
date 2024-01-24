<?php

include '../../config/initiate.php';
 

$output["message"] = "";
$error = ""; 

$missing = array();
 foreach ($_POST as $key => $value) { if ($value == "") { array_push($missing, $key);}}
 if (count($missing) > 0) {
 $error =   "Please Fill all Fields";

  } else {
      $_id = $_SESSION['Account_id'];
      $_User_Account_Name =  $_SESSION['Account_Name'] = "aera007kim";
      $_Old = strip_tags(htmlspecialchars($_POST['old']));
      $_New = strip_tags(htmlspecialchars($_POST['new']));
     
    
    
      $statement_pass = qField("account","id",$_SESSION['Account_id']);
      $i = '';
      $count_name = mysqli_num_rows($statement_pass);
        if ($count_name > 0) {
            while ($row = mysqli_fetch_assoc($statement_pass)) {
                $i++;
                
                $dbpas = $row["Password"];  
            }

        
           check_pass_in($_New,$dbpas);
            if (check_pass($_Old,$dbpas) === true){ 
                //echo false;
                
                if (check_pass_in($_New,$dbpas) === true){  
                    $error = 1;
                    $output["message"] = 'Enter a new Password different from the old one'; 
                    }else {
                        
                        $_New_pc = passCrypt($_New);
                        if (  mysqli_query($con, " UPDATE account
                            SET
                            `Password` = '" .$_New_pc. "',
                            `Newpassword` ='".$_New."'
                            WHERE 
                            id = '" .$_id. "' ")) {
                            //echo 090909;
                            $output["message"] = true;
                        } else {
                            $error = mysqli_error($con);
                        }
                  }
              }else{
             
                $error  = 'Wrong Password Entered'; 
              }       
      }else{
        $error = 'User Not Found';
      }
    
  }
$details = [
    'output1'             =>  $output["message"],
    'error'               =>  $error 
];
echo json_encode($details);