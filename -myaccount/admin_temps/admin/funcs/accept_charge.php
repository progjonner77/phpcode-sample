<?php 


include '../../config/initiate.php';


$error = "";
$output = "";


$missing = array();
 foreach ($_POST as $key => $value) { if ($value == "") { array_push($missing, $key);}}
 if (count($missing) > 0) {
 $error =  "Please Fill all Fields";
  } else {
      unset($missing);
      // do your stuff here with the $_POST
      $_id = $_SESSION['Account_id'];
      $_User_Account_Name =  $_SESSION['Account_Name'];
      $_Amount = stripslashes($_POST['Amount']);
      $_Converted = stripslashes($_POST['Converted']);
      $_To = symbolToName(stripslashes($_POST['To']));
      $_Parcent = stripslashes($_POST['Parcent']);

    
      @ $Reference = Track();
      $_Purpose_For_Transfer = "Exchange Charges";
      $Type = "in";
      // echo $_POST["status"];
      // die();

  
          $result = mysqli_query(
              $con,
              " SELECT * FROM `account`
                     WHERE 
                     `id` = '".$_id."'
           "
          );
          $count = mysqli_num_rows($result);
          if ($count > 0) {
              while ($row = mysqli_fetch_assoc($result)) {
                  $_User_Name = $row["Account_Name"];
                  $_Account_no = $row['Account_Number'];
                  $Account_Email_Address = $row["Account_Email_Address"];
              }
              
              @$Bal_sum = $_Converted - $_Parcent;
              $Bal_total = $Bal_sum;
              // die();
          }
          //echo mb_substr($db_Bal,0,1,'UTF-8'); //get gibrish
        $result = 1;//send_email($_Amount, $Bal_total, $Account_Email_Address,$_User_Name, $_Account_Number,$_Account_Name, $_Beneficiary_bank_name,$_Currency);
        
    if ($result == 1) {
        if ($Bal_sum > 0) {
            if (mysqli_query($con, "
                        UPDATE account
                        SET
                            Currency = '".$_To."',
                            Account_Balance = '".$Bal_total."'
                            WHERE 
    
                            Account_Name = '" .$_User_Name. "'
                            AND
                            Account_Number = '" .$_Account_no. "'
    
                            ")) {
                if (mysqli_query($con, "INSERT INTO statement
                                                            (`id`,
                                                            `User_id`, 
                                                            `User_Name`,
                                                            `Image_Name`,
                                                            `Purpose`,
                                                            `Reference`,
                                                            `Amount`,
                                                            `Bal`,
                                                            `Type`,
                                                            `Date`) 
                                                            VALUES 
                                                            ('',
                                                            '" . $_id . "',
                                                            '" . $_User_Name . "',
                                                            'Null',
                                                            '" . $_Purpose_For_Transfer . " {Debit}',
                                                            '" . $Reference . "',
                                                            '" . $_Parcent ."',
                                                            '" . $Bal_total . "',
                                                            '" . $Type . "',
                                                            '" . date("Y:m:d") . "'
                                                                ) ")) {
                    $output = true;
                //echo $dbpquantity;
        // '<br>'.$dbPosible_date_of_arrival." ".$Posible_date_of_arrival;
                } else {
                    //  echo 90909;
                    $error = mysqli_error($con);
                }
            } else {
                //echo 90;
                $error = mysqli_error($con);
            }
        } else {
            $error = "Insuficient Balance";
        }
    }
   


      //echo $Posible_date_of_arrival;
//catch all my result and send it throug jason encode;
  }

$details = [
    'output1'             =>  $output,
    'error'               =>  $error
];

echo json_encode($details);
