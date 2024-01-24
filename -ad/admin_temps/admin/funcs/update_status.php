<?php
include '../../config/initiate.php';


$error = "";
$output = "";

//var_dump($_POST);
$missing = array();
 foreach ($_POST as $key => $value) { if ($value == "") { array_push($missing, $key);}}
 if (count($missing) > 0) {
 $error =  "Please Fill all Fields";
  } else {
    //  echo 000;
  unset($missing);
    $_id = $_SESSION['user_id'];
    $_User_Account_Name =  $_SESSION['username'];
    $_id= strip_tags(stripcslashes($_POST["id"]));
    $_type= strip_tags(stripcslashes($_POST["type"]));
    $_status= strip_tags(stripcslashes($_POST["status"]));
    
    @$date  = strip_tags(stripslashes($_POST["date"]));
    @$amount  = strip_tags(stripslashes($_POST["amount"]));
    @$Balance  = strip_tags(stripslashes($_POST["Balance"]));
    @$purpose  = strip_tags(stripslashes($_POST["purpose"]));
    
    @$date  = strip_tags(stripslashes($_POST["date"]));
    @$Amount  = strip_tags(stripslashes($_POST["Amount"]));
    @$More_info  = strip_tags(stripslashes($_POST["More_info"]));
    
   //client         
        if($_type === "Client" ):
                    // do your stuff here with the $_POST
                    if (mysqli_query($con, " UPDATE account
                    SET
                    `Status` = '" .$_status. "'
                    WHERE 
                    id = '" .$_id. "'                                  
                    ")) {

                    $output = true;
                    //echo $dbpquantity;
                    // '<br>'.$dbPosible_date_of_arrival." ".$Posible_date_of_arrival;
                    } else {
                    // echo 90909;
                    $error = mysqli_error($con);
                    }
        
        elseif($_type === "Withdrawal"):
                     // do your stuff here with the $_POST
                     if (mysqli_query($con, " UPDATE withdrawal
                     SET
                     `Status` = '" .$_status. "'
                     WHERE 
                     id = '" .$_id. "'                                  
                     ")) {
 
                     $output = true;
                     //echo $dbpquantity;
                     // '<br>'.$dbPosible_date_of_arrival." ".$Posible_date_of_arrival;
                     } else {
                     // echo 90909;
                     $error = mysqli_error($con);
                      }
           elseif($_type === "Withdrwal_edit"):
                     // do your stuff here with the $_POST
                     if (mysqli_query($con, " UPDATE withdrawal
                     SET
                     `date` = '" .$date. "',
                     `Amount` = '" .$Amount. "',                     
                     `More_info` = '" .$More_info. "'                    
                     WHERE 
                     id = '" .$_id. "'                                  
                     ")) {
 
                     $output = true;
                     //echo $dbpquantity;
                     // '<br>'.$dbPosible_date_of_arrival." ".$Posible_date_of_arrival;
                     } else {
                     // echo 90909;
                     $error = mysqli_error($con);
                      }
         elseif($_type === "withdraw_delete"):
                      // do your stuff here with the $_POST
                      if (mysqli_query($con, " Delete from `withdrawal`
                      WHERE 
                      id = '" .$_id. "'                                  
                      ")) {

                      $output = true;
                      } else {
                      // echo 90909;
                      $error = mysqli_error($con);
                        }
          elseif($_type === "Loan"):
                      // do your stuff here with the $_POST
                      if (mysqli_query($con, " UPDATE loan
                      SET
                      `Status` = '" .$_status. "'
                      WHERE 
                      id = '" .$_id. "'                                  
                      ")) {

                      $output = true;
                      //echo $dbpquantity;
                      // '<br>'.$dbPosible_date_of_arrival." ".$Posible_date_of_arrival;
                      } else {
                      // echo 90909;
                      $error = mysqli_error($con);
                        }
        elseif($_type === "Transfers"):
                      // do your stuff here with the $_POST
                      if (mysqli_query($con, " UPDATE `statement`
                      SET
                      `date` = '" .$date. "',
                      `amount` = '" .$amount. "',
                      `Bal` = '" .$Balance. "',
                      `purpose` = '" .$purpose. "'

                      WHERE 
                      id = '" .$_id. "'                                  
                      ")) {

                      $output = true;
                      //echo $dbpquantity;
                      // '<br>'.$dbPosible_date_of_arrival." ".$Posible_date_of_arrival;
                      } else {
                      // echo 90909;
                      $error = mysqli_error($con);
                        }
 elseif($_type === "Transfers_delete"):
                      // do your stuff here with the $_POST
                      if (mysqli_query($con, " Delete from `statement`
                      WHERE 
                      id = '" .$_id. "'                                  
                      ")) {

                      $output = true;
                      } else {
                      // echo 90909;
                      $error = mysqli_error($con);
                        }
          elseif($_type === "Accounts"):
                      // do your stuff here with the $_POST
                      if (mysqli_query($con, " UPDATE `add_bank_account`
                      SET
                      `Status` = '" .$_status. "'
                      WHERE 
                      id = '" .$_id. "'                                  
                      ")) {

                      $output = true;
                      //echo $dbpquantity;
                      // '<br>'.$dbPosible_date_of_arrival." ".$Posible_date_of_arrival;
                      } else {
                      // echo 90909;
                      $error = mysqli_error($con);
                        }              
          elseif($_type === "Card"):
                      // do your stuff here with the $_POST
                      if (mysqli_query($con, " UPDATE `card_request`
                      SET
                      `Status` = '" .$_status. "'
                      WHERE 
                      id = '" .$_id. "'                                  
                      ")) {

                      $output = true;
                      //echo $dbpquantity;
                      // '<br>'.$dbPosible_date_of_arrival." ".$Posible_date_of_arrival;
                      } else {
                      // echo 90909;
                      $error = mysqli_error($con);
                        }    
         elseif($_type === "Card_1"):
                      // do your stuff here with the $_POST
                      if (mysqli_query($con, " UPDATE `card_request`
                      SET
                      `Delivery` = '" .$_status. "'
                      WHERE 
                      id = '" .$_id. "'                                  
                      ")) {

                      $output = true;
                      //echo $dbpquantity;
                      // '<br>'.$dbPosible_date_of_arrival." ".$Posible_date_of_arrival;
                      } else {
                      // echo 90909;
                      $error = mysqli_error($con);
                        }                              
        endif;

     
}
$details = [
    'output1'             =>  $output,
    'error'               =>  $error
];

echo json_encode($details);