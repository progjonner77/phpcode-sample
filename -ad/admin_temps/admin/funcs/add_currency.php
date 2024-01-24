


<?php
include '../../config/initiate.php';
// <!-- $
// C¥
// J¥
// €
// £
// AUD$
// Fr
// W -->

$error = "";
$output = "";

$missing = array();
 foreach ($_POST as $key => $value) { if ($value == "") { array_push($missing, $key);}}
 if (count($missing) > 0) {
 $error =  "Please Fill all Fields";
  } else {
    
      unset($missing);
      // do your stuff here with the $_POST
      $_id = $_SESSION['user_id'];
      $_User_Account_Name =  $_SESSION['username'];
      $_Name = stripslashes(strtoupper($_POST['Name']));
      $_Symbol = stripslashes(strtoupper($_POST['Symbol']));

      $result = mysqli_query($con," SELECT * FROM `currency` WHERE Names='". $_Name ."' AND Symbol='" .$_Symbol. "'");
      $count = mysqli_num_rows($result);
   
    if ($count < 1) {
       
        while ($row = mysqli_fetch_assoc($result)) {
            $dbName = $row["Name"];
            $dbSymbol = strval($row["Symbol"]);
        }
             if (mysqli_query($con, "INSERT INTO currency
                                        (`id`,
                                        `Names`, 
                                        `Symbol`) 
                                        VALUES 
                                        ('',
                                        '" . $_Name . "',
                                        '" . $_Symbol . "'
                                            ) ")) {
                        $output = true;
                        //echo $dbpquantity;
                        // '<br>'.$dbPosible_date_of_arrival." ".$Posible_date_of_arrival;
                        } else {
                        //  echo 90909;
                        $error = mysqli_error($con);
                        }
    }else{
        $error = "Oops!, Currency Symbol or Name already Exists";
    }
  }
  $details = [
    'output1'             =>  $output,
    'error'               =>  $error
];

echo json_encode($details);