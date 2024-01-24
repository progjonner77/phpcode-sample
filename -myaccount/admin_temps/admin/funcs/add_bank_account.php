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
    $_id = $_SESSION['Account_id'];
    $_User_Account_Name =  $_SESSION['Account_Name'];
    $_Account_Name= strip_tags(stripcslashes($_POST["Account_Name"]));
    $_Account_Type= strip_tags(stripcslashes($_POST["Account_Type"]));
    $_Account_Email_Address= strip_tags(stripcslashes($_POST["Account_Email_Address"]));
    $_Account_Tel_No= strip_tags(stripcslashes($_POST["Account_Tel_No"]));
    $_Account_Balance= strip_tags(stripcslashes($_POST["Account_Balance"]));
    $_Currency= strip_tags(stripcslashes($_POST["Currency"]));
    $_Country= strip_tags(stripcslashes($_POST["Country"]));
    $_IBAN_Number= strip_tags(stripcslashes($_POST["IBAN_Number"]));
    $_Marital_Status= strip_tags(stripcslashes($_POST["Marital_Status"]));
    $_Zip_Code= strip_tags(stripcslashes($_POST["Zip_Code"]));
    $_Occupation= strip_tags(stripcslashes($_POST["Occupation"]));
    $_Next_of_KIN= strip_tags(stripcslashes($_POST["Next_of_KIN"]));
    
 /*
 Account_Name
Account_Type
Account_Email_Address
Account_Tel_No
Account_Balance
Currency
Country
IBAN_Number
Marital_Status
Zip_Code
Occupation
Next_of_KIN
 */
  // do your stuff here with the $_POST
  if (mysqli_query($con, "INSERT INTO  add_bank_account  
                                                            (`id`,
                                                            `user_id`, 
                                                            `User_name`,
                                                            `Image_Name`,
                                                            `Account_Name`,
                                                            `Account_Type`,
                                                            `Account_Email_Address`,
                                                            `Account_Tel_No`,
                                                            `Currency`,
                                                            `Country`,
                                                            `IBAN_Number`,
                                                            `Marital_Status`,
                                                            `Zip_Code`,
                                                            `Occupation`,
                                                            `Next_of_KIN`,
                                                            `Date`) 
                                                            VALUES 
                                                            ('',
                                                            '" . $_id . "',
                                                            '". $_User_Account_Name ."',
                                                            'Null',
                                                            '". $_Account_Name ."',
                                                            '". $_Account_Type ."',
                                                            '". $_Account_Email_Address ."',
                                                            '". $_Account_Tel_No ."',
                                                            '". $_Currency ."',
                                                            '". $_Country ."',
                                                            '". $_IBAN_Number ."',
                                                            '". $_Marital_Status ."',
                                                            '". $_Zip_Code ."',
                                                            '". $_Occupation ."',
                                                            '". $_Next_of_KIN ."',
                                                            '" . date("Y:m:d") . "'
                                                                ) ")) {

                     $output = true;
                    //echo $dbpquantity;
                    // '<br>'.$dbPosible_date_of_arrival." ".$Posible_date_of_arrival;
                    } else {
                        // echo 90909;
                        $error = mysqli_error($con);
                    }
                    


}
$details = [
    'output1'             =>  $output,
    'error'               =>  $error
];

echo json_encode($details);